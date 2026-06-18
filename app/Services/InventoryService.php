<?php
namespace App\Services;

use App\Models\Inventory;
use App\Models\StockTransaction;
use Illuminate\Database\DatabaseManager;

class InventoryService
{
    public function __construct(protected DatabaseManager $db)
    {}

    /**
     * Process an inbound stock delivery safely inside a transaction.
     */
    public function processInbound(array $data, int $userId): Inventory
    {
        // wrap execution inside the transaction block
        return $this->db->transaction(function () use ($data, $userId) {
            // find or create batch
            $batch = Inventory::firstOrCreate(
                [
                    'product_id'  => $data['product_id'],
                    'facility_id' => $data['facility_id'],
                    'batch_no'    => $data['batch_no'],
                ],
                [
                    'exp_date'      => $data['exp_date'],
                    'current_stock' => 0,
                ]
            );

            // update the physical snapshot qty
            $batch->increment('current_stock', $data['current_stock']);

            // log permanent audit trail line
            StockTransaction::create([
                'batch_id' => $batch->id,
                'user_id'  => $userId,
                'qty'      => $data['current_stock'],
                'type'     => 'inbound',
                'note'     => $data['note'] ?? null,
            ]);

            return $batch;
        });
    }

    /**
     * Process an outbound stock delivery safely inside a transaction.
     */
    public function processOutbound(array $data, int $userId): Inventory
    {
        return $this->db->transaction(function () use ($data, $userId) {
            //locate the specific inventory batch
            $batch = Inventory::where([
                'product_id'  => $data['product_id'],
                'facility_id' => $data['facility_id'],
                'batch_no'    => $data['batch_no'],
            ])->first();

            // 2. Fail safely if the batch doesn't exist or doesn't have enough stock
            if (! $batch || $batch->current_stock < $data['qty']) {
                throw new \Exception("Insufficient stock available for this batch.");
            }

            // Deduct the physical snapshot qty
            $batch->decrement('current_stock', $data['qty']);

            //Log permanent audit trail line
            StockTransaction::create([
                'batch_id' => $batch->id,
                'user_id'  => $userId,
                'qty'      => $data['qty'],
                'type'     => 'outbound', // Clear distinction in audit logs
                'note'     => $data['note'] ?? null,
            ]);

            return $batch;
        });
    }
}

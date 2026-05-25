<?php
namespace App\Http\Resources;

use App\Enums\FilePath;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function toArray(Request $request): array
    {
        $image_url = 'images/' . FilePath::PRODUCT->value . '/';
        return [
            'id'             => $this->id,
            'code'           => $this->code,
            'name'           => $this->name,
            'category_id'    => $this->category_id,
            'dosage_form_id' => $this->dosage_form_id,
            'dosage'         => $this->dosage,
            'status'         => $this->status,
            'description'    => $this->description,
            'image_url'      => $this->image ? asset($image_url . $this->image) : null,
            // 'image'          => asset('storage/files/' . $this->image),
            'image_name'     => $this->image,
        ];

    }
}

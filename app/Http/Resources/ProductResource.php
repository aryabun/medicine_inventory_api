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
            'id'          => $this->id,
            'code'        => $this->code,
            'name'        => $this->name,
            'category'    => $this->category,
            'dosage_form' => $this->dosage_form,
            'dosage'      => $this->dosage,
            'status'      => $this->status,
            'description' => $this->description,
            'image_url'   => $this->image ? asset($image_url . $this->image) : null,
            'image_name'  => $this->image,
            "created_at"  => $this->created_at,
            "updated_at"  => $this->updated_at,
            "deleted_at"  => $this->deleted_at,
        ];

    }
}

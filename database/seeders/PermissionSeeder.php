<?php

namespace Database\Seeders;

use App\Models\permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        #category

        permission::query()->insert([
            [
                'title' => 'create-category' ,
                'label' => 'ایجاد دسته بندی'
            ],  [
                'title' => 'read-category' ,
                'label' => 'مشاهده دسته بندی'
            ],  [
                'title' => 'update-category' ,
                'label' => 'ویرایش دسته بندی'
            ],  [
                'title' => 'delete-category' ,
                'label' => 'حذف دسته بندی'
            ],
        ]);    permission::query()->insert([
            [
                'title' => 'create-brand' ,
                'label' => 'ایجاد برند'
            ],  [
                'title' => 'read-brand' ,
                'label' => 'مشاهده برند'
            ],  [
                'title' => 'update-brand' ,
                'label' => 'ویرایش برند'
            ],  [
                'title' => 'delete-brand' ,
                'label' => 'حذف برند'
            ],
        ]);
        permission::query()->insert([
            [
                'title' => 'create-product' ,
                'label' => 'ایجاد محصول'
            ],  [
                'title' => 'read-product' ,
                'label' => 'مشاهده محصول'
            ],  [
                'title' => 'update-product' ,
                'label' => 'ویرایش محصول'
            ],  [
                'title' => 'delete-product' ,
                'label' => 'حذف محصول'
            ],
        ]);
        permission::query()->insert([
            [
                'title' => 'create-discount' ,
                'label' => 'ایجاد تخفیف'
            ],  [
                'title' => 'read-discount' ,
                'label' => 'مشاهده تخفیف'
            ],  [
                'title' => 'update-discount' ,
                'label' => 'ویرایش تخفیف'
            ],  [
                'title' => 'delete-discount' ,
                'label' => 'حذف تخفیف'
            ],
        ]);
        permission::query()->insert([
            [
                'title' => 'create-offer' ,
                'label' => 'ایجاد کد تخفیف'
            ],  [
                'title' => 'read-offer' ,
                'label' => 'مشاهده کد تخفیف'
            ],  [
                'title' => 'update-offer' ,
                'label' => 'ویرایش کد تخفیف'
            ],  [
                'title' => 'delete-offer' ,
                'label' => 'حذف کد تخفیف'
            ],
        ]);
            permission::query()->insert([
            [
                'title' => 'create-role' ,
                'label' => 'ایجاد نقش'
            ],  [
                'title' => 'read-role' ,
                'label' => 'مشاهده نقش'
            ],  [
                'title' => 'update-role' ,
                'label' => 'ویرایش نقش'
            ],  [
                'title' => 'delete-role' ,
                'label' => 'حذف نقش'
            ],
        ]);   permission::query()->insert([
            [
                'title' => 'create-gallery' ,
                'label' => 'ایجاد گالری'
            ],  [
                'title' => 'read-gallery' ,
                'label' => 'مشاهده گالری'
            ],  [
                'title' => 'update-gallery' ,
                'label' => 'ویرایش گالری'
            ],  [
                'title' => 'delete-gallery' ,
                'label' => 'حذف گالری'
            ],
        ]); permission::query()->insert([
            [
                'title' => 'view-dashboard' ,
                'label' => 'مشاهده داشبورد'
            ],
        ]);
    }
}

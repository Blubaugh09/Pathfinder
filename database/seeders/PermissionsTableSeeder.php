<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 19,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 20,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 21,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 22,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 23,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 24,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 25,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 26,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 27,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 28,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 29,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 30,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 31,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 32,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 33,
                'title' => 'user_interaction_create',
            ],
            [
                'id'    => 34,
                'title' => 'user_interaction_edit',
            ],
            [
                'id'    => 35,
                'title' => 'user_interaction_show',
            ],
            [
                'id'    => 36,
                'title' => 'user_interaction_delete',
            ],
            [
                'id'    => 37,
                'title' => 'user_interaction_access',
            ],
            [
                'id'    => 38,
                'title' => 'bookmark_create',
            ],
            [
                'id'    => 39,
                'title' => 'bookmark_edit',
            ],
            [
                'id'    => 40,
                'title' => 'bookmark_show',
            ],
            [
                'id'    => 41,
                'title' => 'bookmark_delete',
            ],
            [
                'id'    => 42,
                'title' => 'bookmark_access',
            ],
            [
                'id'    => 43,
                'title' => 'session_create',
            ],
            [
                'id'    => 44,
                'title' => 'session_edit',
            ],
            [
                'id'    => 45,
                'title' => 'session_show',
            ],
            [
                'id'    => 46,
                'title' => 'session_delete',
            ],
            [
                'id'    => 47,
                'title' => 'session_access',
            ],
            [
                'id'    => 48,
                'title' => 'note_create',
            ],
            [
                'id'    => 49,
                'title' => 'note_edit',
            ],
            [
                'id'    => 50,
                'title' => 'note_show',
            ],
            [
                'id'    => 51,
                'title' => 'note_delete',
            ],
            [
                'id'    => 52,
                'title' => 'note_access',
            ],
            [
                'id'    => 53,
                'title' => 'node_image_create',
            ],
            [
                'id'    => 54,
                'title' => 'node_image_edit',
            ],
            [
                'id'    => 55,
                'title' => 'node_image_show',
            ],
            [
                'id'    => 56,
                'title' => 'node_image_delete',
            ],
            [
                'id'    => 57,
                'title' => 'node_image_access',
            ],
            [
                'id'    => 58,
                'title' => 'node_type_create',
            ],
            [
                'id'    => 59,
                'title' => 'node_type_edit',
            ],
            [
                'id'    => 60,
                'title' => 'node_type_show',
            ],
            [
                'id'    => 61,
                'title' => 'node_type_delete',
            ],
            [
                'id'    => 62,
                'title' => 'node_type_access',
            ],
            [
                'id'    => 63,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}

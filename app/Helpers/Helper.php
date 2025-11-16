<?php

namespace App\Helpers;

class Helper
{
    // Format harga ke rupiah
    public static function formatRupiah($harga)
    {
        return 'Rp ' . number_format($harga, 0, ',', '.');
    }

    // Cek apakah user adalah admin
    public static function isAdmin()
    {
        return session()->has('admin_id');
    }

    // Cek apakah user adalah superadmin
    public static function isSuperAdmin()
    {
        $adminId = session()->get('admin_id');
        $admin = \App\Models\Admin::find($adminId);
        return $admin && $admin->role === 'superadmin';
    }

    // Get nama admin yang login
    public static function getAdminName()
    {
        $adminId = session()->get('admin_id');
        $admin = \App\Models\Admin::find($adminId);
        return $admin ? $admin->name : null;
    }
}
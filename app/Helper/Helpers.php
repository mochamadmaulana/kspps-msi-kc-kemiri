<?php
namespace App\Helper;

use App\Models\RegistrasiAnggota;
use App\Models\User;

class Helpers {
    public static function filter_role(array $filter, string $id_kantor, array $except = null)
    {
        $result = [];
        $array_filter = $filter;
        $array_role = User::where('kantor_id',$id_kantor)->pluck('role')->toArray();
        for ($i=0; $i < count($array_filter); $i++) {
            if(!in_array($array_filter[$i],$array_role)){
                array_push($result,$array_filter[$i]);
            }
        }
        if($except){
            foreach ($except as $value) {
                array_push($result,$value);
            }
        }
        return array_values($result);
    }
    public static function str_ucfirst(string $string)
    {
        $array_string = explode(' ',$string);
        $maping = array_map('ucfirst', array_map('strtolower', $array_string));
        return implode(' ',$maping);
    }
    public static function bg_badge_role(string $role)
    {
        if($role == 'Super Admin'){
            return 'badge bg-dark-lt';
        }elseif($role == 'Admin'){
            return 'badge bg-blue-lt';
        }elseif($role == 'Staff Lapangan'){
            return 'badge bg-muted-lt';
        }elseif($role == 'Asmen Keuangan'){
            return 'badge bg-purple-lt';
        }elseif($role == 'Asmen Pembiayaan'){
            return 'badge bg-yellow-lt';
        }else{
            return 'badge bg-green-lt';
        }
    }
    public static function badge_status_keanggotaan(string $status)
    {
        if($status == 'Tidak Aktif'){
            return 'badge bg-red';
        }elseif($status == 'Aktif'){
            return 'badge bg-green';
        }elseif($status == 'Dibekukan'){
            return 'badge bg-muted';
        }else{
            return 'badge bg-red';
        }
    }
    public static function badge_registrasi_anggota(string $role)
    {
        if($role == 'Diajukan'){
            return 'badge bg-blue';
        }elseif($role == 'Diproses'){
            return 'badge bg-muted';
        }elseif($role == 'Diterima'){
            return 'badge bg-green';
        }elseif($role == 'Ditolak'){
            return 'badge bg-red';
        }else{
            return 'badge bg-blue';
        }
    }
    public static function badge_status_karyawan(string $status)
    {
        if($status == 'Tidak Aktif'){
            return 'badge bg-red';
        }elseif($status == 'Aktif'){
            return 'badge bg-green';
        }elseif($status == 'Dibekukan'){
            return 'badge bg-muted';
        }else{
            return 'badge bg-red';
        }
    }
    public static function nomor_registrasi_anggota(Int $last_no, String $id_kantor)
    {
        $nomor_registrasi = $id_kantor.str_pad(substr($last_no,-6)+1,6,0,STR_PAD_LEFT);
        return $nomor_registrasi;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;

    // protected $primarykey = 'id';
    // public $incrementing = false;
    protected $table = 'barang';
    protected $fillable = [
        'kode_barang',
        'produk_id',
        'nama_barang',
        'satuan',
        'harga_jual',
        'stok',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public static function get_code()
    {
        $no_urut = self::selectRaw("IFNULL(MAX(SUBSTRING(`kode_barang`,8,5)),0) + 1 AS no_urut")->orderBy('no_urut')->first()->no_urut;
        $kode_barang = "B" . date("Ym") . sprintf("%'.02d", $no_urut);
        return $kode_barang;
    }
}

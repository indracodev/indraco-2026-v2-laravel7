<?php

namespace App\Services;

use App\Models\MasterProduk;
use App\Models\MasterMerek;
use App\Models\MasterKategori;
use App\Models\MasterVariant;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class ExcelImportService
{
    /**
     * Parse CSV or Excel file stream to array rows.
     */
    public static function parseFile($file)
    {
        $rows = [];
        $handle = fopen($file->getRealPath(), "r");
        if ($handle !== false) {
            $header = null;
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                // Remove BOM if exists
                if (isset($data[0])) {
                    $data[0] = preg_replace('/\x{EF}\x{BB}\x{BF}/', '', $data[0]);
                }
                
                if (!$header) {
                    $header = array_map('trim', array_map('strtolower', $data));
                } else {
                    if (count($data) == count($header)) {
                        $rows[] = array_combine($header, array_map('trim', $data));
                    }
                }
            }
            fclose($handle);
        }
        return $rows;
    }

    /**
     * Import Master Produk from parsed rows.
     */
    public static function importProduk($rows)
    {
        $importedCount = 0;
        foreach ($rows as $row) {
            $namaProduk = $row['nama_produk'] ?? $row['nama'] ?? null;
            if (!$namaProduk) continue;

            $slug = !empty($row['slug']) ? Str::slug($row['slug']) : Str::slug($namaProduk);

            MasterProduk::updateOrCreate(
                ['slug' => $slug],
                [
                    'nama_produk' => $namaProduk,
                    'sku' => $row['sku'] ?? null,
                    'harga_reguler' => isset($row['harga']) ? (numeric) $row['harga'] : null,
                    'deskripsi_singkat' => $row['deskripsi_singkat'] ?? null,
                    'deskripsi_lengkap' => $row['deskripsi_lengkap'] ?? null,
                    'tipe_packing' => $row['tipe_packing'] ?? null,
                    'inner_kemasan' => $row['inner_kemasan'] ?? null,
                    'status' => isset($row['status']) ? strtolower($row['status']) : 'active',
                ]
            );
            $importedCount++;
        }
        return $importedCount;
    }

    /**
     * Import Master Merek from parsed rows.
     */
    public static function importMerek($rows)
    {
        $importedCount = 0;
        foreach ($rows as $row) {
            $namaMerek = $row['nama_merek'] ?? $row['nama'] ?? null;
            if (!$namaMerek) continue;

            $slug = !empty($row['slug']) ? Str::slug($row['slug']) : Str::slug($namaMerek);

            MasterMerek::updateOrCreate(
                ['slug' => $slug],
                [
                    'nama_merek' => $namaMerek,
                    'deskripsi' => $row['deskripsi'] ?? null,
                    'status' => isset($row['status']) ? strtolower($row['status']) : 'active',
                ]
            );
            $importedCount++;
        }
        return $importedCount;
    }

    /**
     * Import Master Kategori from parsed rows.
     */
    public static function importKategori($rows)
    {
        $importedCount = 0;
        foreach ($rows as $row) {
            $namaKategori = $row['nama_kategori'] ?? $row['nama'] ?? null;
            if (!$namaKategori) continue;

            $slug = !empty($row['slug']) ? Str::slug($row['slug']) : Str::slug($namaKategori);

            MasterKategori::updateOrCreate(
                ['slug' => $slug],
                [
                    'nama_kategori' => $namaKategori,
                    'urutan' => isset($row['urutan']) ? (int)$row['urutan'] : 0,
                    'status' => isset($row['status']) ? strtolower($row['status']) : 'active',
                ]
            );
            $importedCount++;
        }
        return $importedCount;
    }
}

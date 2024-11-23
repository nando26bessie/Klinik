<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailTransaksiMigration extends Migration
{
    public function up()
    {
        // Menambahkan field untuk tabel detail_transaksi
        $this->forge->addField([
            'jumlah' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false,
            ],
            'kode_obat' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
            ],
            'id_transaksi' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
            ],
        ]);

        // Menambahkan primary key gabungan
        $this->forge->addKey(['kode_obat', 'id_transaksi'], true); // Jika perlu, bisa ditambahkan sebagai primary key gabungan

        // Menambahkan foreign key
        $this->forge->addForeignKey('kode_obat', 'obat', 'kode_obat', 'CASCADE', 'CASCADE'); // Menambahkan foreign key untuk kode_obat
        $this->forge->addForeignKey('id_transaksi', 'transaksi', 'id_transaksi', 'CASCADE', 'CASCADE'); // Menambahkan foreign key untuk id_transaksi

        // Membuat tabel detail_transaksi
        $this->forge->createTable('detail_transaksi'); 
    }

    public function down()
    {
        // Menghapus tabel detail_transaksi saat migrasi dihapus
        $this->forge->dropTable('detail_transaksi'); 
    }
}
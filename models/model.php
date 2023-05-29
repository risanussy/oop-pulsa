<?php
    require_once "connection.php";

    class Models extends Connection {
        public $id_root;
        public $id;
        public $nama;
        public $saldo;

        public function __construct($id_root){
            $this->id_root = $id_root;
        }

        public function read(){
            if(!$this->conn()){
                echo "Error connecting : " . mysqli_error($this->conn());
            }

            $hasil = mysqli_query($this->conn(), "SELECT * FROM users WHERE id=$this->id_root");

            if (mysqli_num_rows($hasil) > 0){
                while ($row = mysqli_fetch_assoc($hasil)){
                    $this->nama = $row['nama'];
                    $this->saldo = $row['saldo'];
                    $this->id = $row['id'];
                }
            }   
        }

        public function update($input){
            // update saldo
            $saldo_post = $this->saldo + $input;
            $query = "UPDATE users SET saldo='$saldo_post' WHERE id=$this->id";
            $hasil = mysqli_query($this->conn(), $query);
            
            if($hasil){
                $this->read();
                // echo "berhasil";
            }else {
                echo "gagal : " . mysqli_error($this->conn());
            }
        }

        public function transaksi($kartu, $provider, $nominal) {
            // update saldo
            $saldo_post = $this->saldo - $nominal;
            $kurang = "UPDATE users SET saldo='$saldo_post' WHERE id=$this->id";
            $hasil = mysqli_query($this->conn(), $kurang);
            
            if($hasil){
                $add = "INSERT INTO transaksi (no_kartu, provider, nominal,tanggal, id_users) VALUES ('$kartu', '$provider', '$nominal', '24/05/2023', '$this->id')";
                $hasil2 = mysqli_query($this->conn(), $add);
                
                if($hasil2){
                    $this->read();
                }else {
                    echo "gagal : " . mysqli_error($this->conn());
                }

            }else {
                echo "gagal : " . mysqli_error($this->conn());
            }
        }

        public function relasi(){
            $query = "SELECT * FROM transaksi WHERE id_users = $this->id";
            $hasil = mysqli_query($this->conn(), $query);
                
            if($hasil){
                return $hasil;
            }else {
                echo "gagal : " . mysqli_error($this->conn());
            }
        }

        public function rupiah($angka){
            return 'Rp. '.strrev(implode('.',str_split(strrev(strval($angka)),3)));
        }
    }
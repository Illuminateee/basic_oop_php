<?php
class database {
    private $host = "localhost";
    private $uname = "root";
    private $pass = "alhafizh1";
    private $db = "db_akademik";
    private $connection; // variable to hold the connection

    // Constructor to establish database connection
    function __construct(){
        $this->connection = mysqli_connect($this->host, $this->uname, $this->pass, $this->db);

        // Check connection
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    // Function to fetch data from the mahasiswa table
    function tampil_data(){
        $hasil = array(); // Initialize the result array
        $query = "SELECT * FROM mahasiswa";
        $data = mysqli_query($this->connection, $query);
        if (!$data) {
            die("Query failed: " . mysqli_error($this->connection));
        }
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    // Function to insert data into the mahasiswa table
    function input($nama, $alamat, $umur){
        $query = "INSERT INTO mahasiswa (nama, alamat, umur) VALUES ('$nama', '$alamat', '$umur')";
        if (!mysqli_query($this->connection, $query)) {
            die("Insert failed: " . mysqli_error($this->connection));
        }
    }

    // Function to delete data from the mahasiswa table
    function hapus($id){
        $query = "DELETE FROM mahasiswa WHERE id='$id'";
        if (!mysqli_query($this->connection, $query)) {
            die("Delete failed: " . mysqli_error($this->connection));
        }
    }

    // Function to fetch data of a specific student for editing
    function edit($id){
        $hasil = array(); // Initialize the result array
        $query = "SELECT * FROM mahasiswa WHERE id='$id'";
        $data = mysqli_query($this->connection, $query);
        if (!$data) {
            die("Query failed: " . mysqli_error($this->connection));
        }
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    // Function to update data in the mahasiswa table
    function update($id, $nama, $alamat, $umur){
        $query = "UPDATE mahasiswa SET nama='$nama', alamat='$alamat', umur='$umur' WHERE id='$id'";
        if (!mysqli_query($this->connection, $query)) {
            die("Update failed: " . mysqli_error($this->connection));
        }
    }
}
?>

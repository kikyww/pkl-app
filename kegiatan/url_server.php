<script>
                            document.getElementById("tanggal").addEventListener("change", function(){
                            fetch("url_server.php", {
                                method: "POST",
                                body: JSON.stringify({ tanggal: this.value }),
                                headers: {
                                    "Content-Type": "application/json"
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                const piket = document.querySelector("select[name='piket']");
                                data.forEach(item => {
                                    const option = document.createElement("option");
                                    option.value = item.id_jadwal;
                                    option.text = item.jadwal;
                                    piket.appendChild(option);
                                    console.log(item)
                                });
                            });
                        });
                        </script>
<?php                           
                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                $data = json_decode(file_get_contents('php://input'), true);
                                $tanggal = $data['tanggal'];
                                $query = mysqli_query($konek, "SELECT * FROM tb_jadwal LEFT JOIN tb_piket ON tb_jadwal.piket_id = tb_piket.id_piket WHERE tanggal = '$tanggal' ORDER BY id_jadwal DESC");
                                $jadwal = array();
                                while ($row = mysqli_fetch_assoc($query)) {
                                    echo "<option value='$row[id_jadwal]'>$row[jadwal]</option>";
                                    $jadwal[] = $row;
                                }
                                echo json_encode($jadwal);
                            }
                            
                                $query = mysqli_query($konek, "SELECT * FROM tb_jadwal INNER JOIN tb_piket ON tb_jadwal.piket_id = tb_piket.id_piket  ORDER BY id_jadwal DESC");
                                while ($data = mysqli_fetch_array($query)) {
                            }
                            ?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<div class="container mt-2">
<h2 style="color: purple" class="text-center">Listrik Kita</h2>
<p class="text-center">Jepang, 1-2-20 Haginochaya, Nishinari Ward, Osaka, 557-0004, Jepang•+901 1-8290-57200</p>
<div class="card">
    <div class="card">
        <table class="table table-hover table-striped">
                <tr>
                    <th>Nama Pelanggan</th>
                    <th>{{ $pembayaran->tagihan->pelanggan->nama_pelanggan }}</th>
                </tr>
                <tr>
                    <th>Bulan Dan Tahun</th>
                    <th>{{ $pembayaran->tagihan->bulan_tahun->format('M Y')}}</th>
                </tr>
                <tr>
                    <th>Biaya Admin</th>
                    <th>Rp. 5.000</th>
                </tr>
                <tr>
                    <th>Total</th>
                    <th>Rp.{{ number_format($pembayaran->total_bayar) }}</th>
                </tr>
        </table>
    </div>
    </div>
    <div class="card"></div>
    <p style="text-align: right">{{$tanggal}}</p>
    <br>
    <br>
    <br>
    <br>
    <br>
    <p style="text-align: right">Admin Listrik Kita</p>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
    </body>
</html>
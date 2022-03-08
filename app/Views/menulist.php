<?=$this->extend('layouts/admin')?>
<?=$this->section('content')?>
<?php
    if (session()->getflashdata('success')){
?>
    <div class="alert alert-success alert-dismissible fade-show" role="alert">
        <?=session()->getFlashdata('success')?>
        <button type="button" class="close" data-dismiss="alert" aria-label="close">Succes</button>
    </div>
<?php
}
?>  
<div class="container">
    <h3> Data Menu</h3>
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addMenu">Tambah Data</button>

    <table class="table table-bordered">
    <thead>
        <th>No</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Jenis</th>
        <th>Stok</th>
        <th>Option</th>
    </thead>
    <tbody>
    <?php
    $no=1;
    foreach($data as $row):
    ?>
    <tr>
        <td><?=$no?></td>
        <td><?=$row['nama']?></td>
        <td><?=$row['harga']?></td>
        <td><?=$row['jenis']?></td>
        <td><?=$row['stok']?></td>
        <td>
    <a href="#" class="btn btn-primary btn-sm btn-edit" data-toggle="modal" data-target="#editMenu-<?=$row['id']?>" btn-sm btn-edit>Edit</a>
    <a href="<?=base_url('MenuController/delete/'.$row['id'])?>"onclick="return confirm('Yakin Akan Dihapus?')" class="btn btn-danger btn-sm btn-delete">Hapus</a>
    </td>
    </tr>

<form action="<?=base_url('menu/edit/'.$row['id'])?>"method="post">
    <div class="modal fade" id="editMenu-<?=$row['id']?>"tabindex="-1"aria-labelledby="exampleModel"aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModelLabel">Add Menu</h5>
                    <button type="button"class="close"data-dismis="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?=base_url('menus')?>"method="post">
                <div class="modal-body">
                <div class="form-group">
                <label>Nama </label>
                <input type="text" name="nama"placeholder="Nama Menu" id="nama" class="form-control" value="<?=$row['nama']?>"required>
                </div>
                <div class="form-group">
                <label>Harga</label>
                <input type="text" name="harga" placeholder="Harga" id="harga" class="form-control" value="<?=$row['harga']?>"required>
                </div>
                <div class="form-group">
                    <label>Jenis Menu</label>
                    <div class="form-check">
                        <input class="form-check-input"type="radio" name="jenis" id="flexRadiodefault1"value="makanan" <?=$row['jenis']=="makanan"?"checked":""?>></input>   
                        <label class="form-check-label" for="flexRadioDefault1">Makanan</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input"type="radio" name="jenis" id="flexRadiodefault2"value="minuman" <?=$row['jenis']=="minuman"?"checked":""?>></input>   
                        <label class="form-check-label" for="flexRadioDefault2">Minuman</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input"type="radio" name="jenis" id="flexRadiodefault3"value="camilan" <?=$row['jenis']=="camilan"?"checked":""?>></input>    
                        <label class="form-check-label" for="flexRadioDefault3">Camilan</label>
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="text" name="stok" placeholder="Stok" id="stok" class="form-control" value="<?=$row['stok']?>"required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</form>
    <?php
    $no++;
    endforeach?>
</tbody>
</table>
</div>

<!--Add product-->
<form action="menus" method="post">
    <div class="modal fade" id="addMenu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLeabel"> Add Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama"placeholder="Nama Menu" required>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control" name="harga"placeholder="Harga" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis</label>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis"id="flexRadioDefault1" value="makanan">
                        <label class="form-check-label" for="flexRadioDefault1">Makanan</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis"id="flexRadioDefault2" value="minuman">
                        <label class="form-check-label" for="flexRadioDefault2">Minuman</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis"id="flexRadioDefault3" value="camilan">
                        <label class="form-check-label" for="flexRadioDefault3">Camilan</label>
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="text" class="form-control" name="stok"placeholder="Stok" required>
                    </div>
                </div>
                <div class="modal-foorter">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">save</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?=$this->endSection()?>
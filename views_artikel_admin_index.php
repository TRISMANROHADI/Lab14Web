<?= $pager->links(); ?>
<form method="get" class="form-search">
 <input type="text" name="q" value="<?= $q; ?>" placeholder="Cari data">
 <input type="submit" value="Cari" class="btn btn-primary">
</form>
<?= $pager->only(['q'])->links(); ?>
<p>
 <input type="file" name="gambar">
 </p>
 <form action="" method="post" enctype="multipart/form-data">
<div id="container" class="container">
	<div id="body">
		<?php echo $this->session->flashdata('status_upload'); ?>
		<form id="upload_form" enctype="multipart/form-data">
			<div class="custom-file">
				<input type="file" class="custom-file-input" name="video" id="fileku">
				<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
			</div>
			
			<div class="progress" style="height: 20px;">
				  <div class="progress-bar" id="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:0%">
					<span id="status"></span>
				  </div>
			</div> 
			
			<div class="form-group">
				<button type="button" class="btn btn-primary" onclick="uploadFile()">Upload !</button>
			</div>
   
		</form>
	</div>
</div>

<script>

function uploadFile() {
    var file = document.getElementById("fileku").files[0];
    var formdata = new FormData();
    formdata.append("video", file);
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressUpload, false);
    ajax.open("POST", "<?php echo base_url('pengguna/upload_video');?>", true);
    ajax.send(formdata);
}

function progressUpload(event){
    var percent = (event.loaded / event.total) * 100;
    document.getElementById("progress-bar").style.width = Math.round(percent)+'%';    
    document.getElementById("status").innerHTML = Math.round(percent)+"%";
	if(event.loaded==event.total){
		window.location.href = '<?php echo base_url('pengguna/unggah-video');?>';
	}
}

</script>
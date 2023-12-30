<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="{{asset ('customers/css/formpaket.css') }}">
   <title>Document</title>
   <style>
      .slider img {
         animation: fade 1s infinite;
         padding: 10px;
      }

   </style>
</head>
<body>

<div class="container">
   <div class="slider">
      <img src="{{asset ('customers/images/formmandah1.jpeg') }}" alt="Image 1">
      <img src="{{asset ('customers/images/formmandah2.jpeg') }}" alt="Image 2">
      <img src="{{asset ('customers/images/formmandah3.jpeg') }}" alt="Image 3">
    </div>
   <div class="form-container">
    <form action="{{ route('paket.store') }}" method="post">
      @csrf
  
      <div class="form-group">
          <label for="paketType">Jenis Paket</label>
          <select id="paketType" name="jenis_paket">
            <option value="5mb">5MB</option>
            <option value="10mb">10MB</option>
            <option value="20mb">20MB</option>
        </select>
      </div>
  
      <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Email">
      </div>
  
      <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" id="nama" name="nama" placeholder="Nama">
      </div>
  
      <div class="form-group">
          <label for="nomorHP">Nomor HP</label>
          <input type="tell" id="nomorHP" name="nomor_hp" placeholder="Nomor HP">
      </div>
  
      <div class="form-group">
          <label for="alamat">Alamat</label>
          <textarea id="alamat" name="alamat" placeholder="Alamat"></textarea>
      </div>
  
      <div class="form-group">
          <input type="submit" value="Submit">
      </div>
  </form>
  </div>
</div>

<script>
   const slider = document.querySelector('.slider');
   const images = slider.querySelectorAll('img');
   let currentIndex = 0;
 
   function showImage(index) {
     images.forEach((img, i) => {
       img.style.display = i === index ? 'block' : 'none';
     });
   }
 
   function nextImage() {
     currentIndex = (currentIndex + 1) % images.length;
     showImage(currentIndex);
   }
 
   setInterval(nextImage, 3000);
 </script>
</body>
</html>
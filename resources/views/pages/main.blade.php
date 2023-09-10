@extends('layouts.landing-page')


@section('content')
<main id="main">
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Tentang</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
              Bisnis merupakan suatu kegiatan yang umumnya dilakukan untuk menghasilkan keuntungan melalui produksi, distribusi, dan penjualan barang atau jasa. Salah satu sektor bisnis yang penting bagi perekonomian adalah UMKM (Usaha Mikro, Kecil, dan Menengah), yang memberikan kontribusi besar terhadap pertumbuhan ekonomi dan penciptaan lapangan kerja.
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> UMKM memiliki peran vital dalam pertumbuhan ekonomi.</li>
              <li><i class="ri-check-double-line"></i> Perkembangan teknologi berdampak besar terhadap perubahan bisnis.</li>
              <li><i class="ri-check-double-line"></i> Bisnis digital menjadi tren untuk efisiensi dan pertumbuhan.</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              E-commerce dan bisnis digital semakin populer dalam era digital saat ini. Manado, sebagai kota dengan potensi UMKM yang besar, terutama di sektor jasa, memiliki peluang untuk berkembang dengan memanfaatkan E-commerce. Banyak usaha di Manado masih menggunakan metode tradisional dalam menjalankan bisnisnya, sehingga E-commerce bisa menjadi solusi untuk memperluas pasar dan meningkatkan efisiensi.
            </p>
          </div>
      </div>
    </section>
    <!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="layanan" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Layanan</h2>
          <p>Temukan layanan jasa anda berdasarkan kategori utama</p>
        </div>
        <div class="row mb-5">
          @foreach ($data_kategori as $data)
              
          <div class="col-xl-4 col-md-6 d-flex align-items-stretch mb-3  text-center" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box w-100" style="border-radius: 1em">
              <div class="icon">{!! $data->icon !!}</div>
              <h4><a href="{{ route('category_home.show', $data->id) }}">{{ $data->nama }}</a></h4>
              <p>{{ $data->deskripsi }}</p>
            </div>
          </div>
          @endforeach
          
        </div>
        

        </div>

      </div>
    </section>
    <!-- End Services Section -->

 
    <section>
      <div class="container" data-aos="fade-up">
        <style>
          .lihat_semua{
            background:rgb(0, 145, 145);
            padding:1em 2em;
            color:white;
            border-radius:2em;
            transition:.3s;
            color:white;
          }
          .lihat_semua:hover{
            color:white;
            background: rgb(3, 88, 88)
          }
        </style>
          <div class="section-title">
            <h2>Temukan Jasa</h2>
            <p>Lihat dan temukan jasa UMKM Sesuai keperluan</p>
          </div>
          <div class="row mb-3 d-flex justify-content-evenly">

            @forelse ($data_service as $service)
            <div class="col-xl-3 col-md-4 d-flex mx-1 mb-3 shadow-sm p-3 rounded" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box w-100" style="border-radius: 1em">
                <div class="badge badge-primary bg-primary mb-3" style="width: 70%; border-radius:3em; font-size:.8em; padding:.9em;">{{ $service->category->nama }}</div>
                <h3><a href="{{ route('service_home.show', $service->id) }}">{{ $service->nama }}</a></h3>
                <address style="color:#bbb"><i class='bx bx-time'></i> {{ $service->created_at->diffForHumans() }}</address>
                <p class="text-truncate">{{ $service->deskripsi }}</p>
                <div class="">
                  <address style="color:#bbb;margin:0px"><i class='bx bx-map'></i> {{ $service->vendor->alamat }}</address>
                  <address style="color:#bbb;margin:0px"><i class='bx bx-phone'></i> {{ $service->vendor->kontak }}</address>
                </div>
              </div>
            </div>
            @empty
                <div class="alert alert-info">Belum ada Service</div>
            @endforelse
          </div>
          <div class="row">
            <div class="col-12 d-flex justify-content-center">
             <a href="{{ route('service_home.index') }}" class="d-flex align-items-center shadow-lg fw-bold lihat_semua">Lihat semua <i class='bx bx-right-arrow-alt' style="font-size:2em"></i></a>
            </div>
          </div>
      </div>
    </section>

      <!-- ======= Call to action Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">
            <h3>Ayo!</h3>
            <p>Manfaatkan Layanan Kami untuk Meningkatkan Bisnismu! Dapatkan Akses Mudah, Efisien, dan Cepat ke Layanan UMKM Terbaik di Manado.</p> 
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Call To Action</a>
          </div>
        </div>

      </div>
    </section><!-- End Cta Section -->

      
  </main><!-- End #main -->

@endsection
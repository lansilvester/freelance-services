@extends('layouts.home-page')
@section('content')

<style>
  .star {
      cursor: pointer;
      font-size: 24px;
      margin-right: 5px;
  }

  .selected {
      color: gold;
  }
  .mb-3{
      margin-bottom:30px;
  }
  .mt-3{
      margin-top:30px;
  }
  h3{
      color:#007ca1;
  }
</style>
<div class="container-fluid py-3">
    <ul class="list-inline text-center">
        @foreach($data_kategori as $data)
            <li class="list-inline-item  m-3">
                <a href="{{ route('category_home.show', $data->id) }}" class="text-decoration-none text-dark">{!! $data->icon !!} {{ $data->nama }}</a>
            </li>
        @endforeach
    </ul>
</div>

<div class="container-fluid" style="background:#eaeaea">
    <div class="container py-5">
        <div class="row mb-3 shadow py-5 px-4 bg-white rounded">
            <div class="col-md-4 col-sm-12 col-xs-12 shadow p-4 rounded">
                <img src="{{ asset('storage/'.$service->foto) }}" alt="" class="img-fluid mb-5" style="width:100%; border-radius:.5em;">
                
                <small>Vendor </small><br>
                <span class="badge badge-info bg-info mb-4"> 
                    <a href="{{ route('vendor_home.show', $service->vendor->id) }}" class="text-decoration-none text-white p-2"><i class="bi bi-award-fill text-warning"></i> 
                        {{ $service->vendor->nama }}
                    </a>
                </span>
                <div class="d-flex justify-content-between mb-3">
                    <b><i class="bi bi-telephone"></i> Kontak</b>
                    <span>{{ $service->vendor->kontak }}</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <b><i class="bi bi-envelope"></i> Email</b>
                    <span><a href="mailto:{{ $service->vendor->user->email }}" target="_blank" class="text-decoration-none">{{ $service->vendor->user->email }}</a></span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <b><i class="bi bi-map"></i> Alamat</b>
                    <span>{{ $service->vendor->alamat }}</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <b><i class="bi bi-at"></i> Social Media</b>
                    <span>
                        <a href="{{ $service->vendor->facebook }}" class="btn btn-primary">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="{{ $service->vendor->instagram }}" class="btn btn-primary">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="{{ $service->vendor->linkedin }}" class="btn btn-primary">
                            <i class="bi bi-linkedin"></i>
                        </a>
                    </span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <a href="https://wa.me/{{ $service->vendor->kontak }}?text=Halo%20admin,%20Saya%20ingin%20melakukan%20pemesanan%20service:%20{{ $service->nama }}"
                        class="btn btn-success w-100" target="_blank">
                        <i class="bi bi-whatsapp"></i> Hubungi via <strong>WhatsApp</strong>
                    </a>
                </div>
                
                
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12 py-3 px-5 rounded">
                <div class="mb-4">
                    <a href="/" class=" text-decoration-none">Beranda</a> &nbsp;>&nbsp; <a href="{{ route('category_home.show',$service->category->id) }}" class=" text-decoration-none">{{ $service->category->nama }}</a> &nbsp;>&nbsp; {{ $service->nama }}
                </div>
                <span class="badge badge-success bg-success mb-2">{{ $service->category->nama }}</span>
                <h3>{{ $service->nama }}</h3>
                <small class="text-dark text-opacity-50">{{ $service->created_at->diffForHumans() }}</small>
                <div class="accordion my-3" id="accordionExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Deskripsi
                        </button>
                      </h2>
                      
                      <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        <p>{{ $service->deskripsi }}</p>  
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Layanan
                        </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                         <p>{{ $service->layanan }}</p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Ulasan
                        </button>
                      </h2>
                      <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @if(Auth::check())
                            <div class="col-12">
                                <h3 class="">Berikan Ulasan Anda</h3>
                                <br>
                                <form method="POST" action="">
                                    @csrf
                                    <input type="hidden" name="kuliner_id" value="">
                                    <div class="rating">
                                        <span class="star" data-rating="1"><i class="bi bi-star"></i></span>
                                        <span class="star" data-rating="2"><i class="bi bi-star"></i></span>
                                        <span class="star" data-rating="3"><i class="bi bi-star"></i></span>
                                        <span class="star" data-rating="4"><i class="bi bi-star"></i></span>
                                        <span class="star" data-rating="5"><i class="bi bi-star"></i></span>
                                        <input type="hidden" name="rating" id="rating" value="0">
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control" id="ulasan" name="ulasan" rows="3" placeholder="Tambahkan komentar"></textarea>
                                    </div>
                                    
                                    <div class="mb-3">
            
                                        <button type="submit" class="btn btn-primary" name="submit"><i class="bi bi-send"></i> Kirim Ulasan</button>
                                    </div>
                                </form>
                            </div>
                            @else

                            @endif

                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
      const stars = document.querySelectorAll('.star');
      const ratingInput = document.getElementById('rating');
      const ulasanInput = document.getElementById('ulasan'); // Ubah ini
  
      stars.forEach(star => {
          star.addEventListener('click', () => {
              const rating = parseInt(star.getAttribute('data-rating'));
              ratingInput.value = rating;
  
              // Untuk memberi efek visual pada bintang yang dipilih.
              stars.forEach(s => {
                  const sRating = parseInt(s.getAttribute('data-rating'));
                  if (sRating <= rating) {
                      s.classList.add('selected');
                  } else {
                      s.classList.remove('selected');
                  }
              });
          });
      });
  
      // Tambahkan event listener untuk mengambil nilai textarea
      ulasanInput.addEventListener('input', function () {
          // Misalnya, Anda dapat menyimpan nilai dalam variabel
          const ulasanValue = this.value;
          // Kemudian, lakukan apa yang Anda inginkan dengan nilai ini
      });
  });
  
  </script>
@endsection
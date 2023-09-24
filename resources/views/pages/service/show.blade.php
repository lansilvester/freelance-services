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
  h5{
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
                        <div class="mb-3 mt-3">
                            <h5 class="fw-bold">Deskripsi</h5>
                            <p class="p-2">{{ $service->deskripsi }}</p>  
                        </div>
                        <div class="mb-3">
                            <h5 class="fw-bold">Layanan</h5>
                            <p class="p-2">{{ $service->layanan }}</p>
                        </div>
                        <div class="mb-3">
                            <h5 class="fw-bold">Ulasan</h5>
                            <div class="ulasan-body p-2">

                                @if(Auth::check())
                                <div class="col-12">
                                <form method="POST" action="{{ route('review_home.store') }}">
                                    @csrf
                                    <input type="hidden" name="service_id" value="{{ $service->id }}">
                                    <div class="rating">
                                        <span class="star" data-rating="1"><i class="bi bi-star"></i></span>
                                        <span class="star" data-rating="2"><i class="bi bi-star"></i></span>
                                        <span class="star" data-rating="3"><i class="bi bi-star"></i></span>
                                        <span class="star" data-rating="4"><i class="bi bi-star"></i></span>
                                        <span class="star" data-rating="5"><i class="bi bi-star"></i></span>
                                        <input type="hidden" name="rating" id="rating" value="0">
                                    </div>
                                    <div class="mb-2">
                                        <textarea class="form-control" id="ulasan" name="comment" rows="3" placeholder="Tambahkan komentar"></textarea>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary" name="submit"><i class="bi bi-send"></i> Kirim Ulasan</button>
                                    </div>
                                </form>
                            </div>
                            @else
                              <div class="alert alert-info"><strong><a href="{{ route('login') }}">Login</a></strong> untuk dapat memberikan komentar</div>
                            @endif
                            @if(session('success_ulasan'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success_ulasan') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            <h5 class="mb-3">Ulasan dari pengguna ({{ $data_ulasan->count() }})</h5>
                            <div class="mb-3">
                                @if ($service->avg_rating())
                                    <div class="mb-3">
                                        @for ($i = 1; $i <= $service->avg_rating(); $i++)
                                            <i class="bi bi-star-fill" style="color: #FFD700;"></i>
                                        @endfor
                                        @for ($i = $service->avg_rating() + 1; $i <= 5; $i++)
                                            <i class="bi bi-star" style="color: #FFD700;"></i>
                                        @endfor
                                        <span>{{ number_format($service->avg_rating(), 1) }}</span>
                                    </div>
                                @else
                                    <div class="mb-3">
                                        <i class="bi bi-star" style="color: #FFD700;"></i>
                                        <i class="bi bi-star" style="color: #FFD700;"></i>
                                        <i class="bi bi-star" style="color: #FFD700;"></i>
                                        <i class="bi bi-star" style="color: #FFD700;"></i>
                                        <i class="bi bi-star" style="color: #FFD700;"></i>
                                        0
                                    </div>
                                @endif
                            </div>
                            {{-- <ul style="list-style-type: none">
                                <style>
                                    .bi-star-fill{
                                        color:#FFD700;
                                    }
                                </style>
                                <li><i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> Kecepatan Membalas</li>
                                <li><i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> Pelayanan</li>
                                <li><i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> Ketrampilan dan keahlian</li>
                                <li><i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> Value for money</li>
                            </ul> --}}
                        </div>
                            <ul id="userReviews" class="list-unstyled">
                                @if ($data_ulasan->isEmpty())
                                <div class="alert alert-info" style="margin: 15px 0;">Belum ada ulasan</div>
                                @else
                                <div class="my-2" style="list-style: none;">
                                    <div class="circle text-center text-primary" style="width:100px;height:100px;padding:.5em;border-radius:50%;background:#c4f1ff">
                                        <h1 class="fw-bold">
                                            <span>{{ number_format($service->avg_rating(), 1) }}</span>
                                        </h1>
                                        <small style="color:#555">dari 5</small>
                                    </div>
                                </div>
                                @foreach ($data_ulasan as $review)
                                <li class="mb-3" style="background:rgba(234, 234, 234, 0.473); padding:1em 2em; border-radius:1em">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="mb-2 d-flex align-items-center">
                                                <img src="{{ asset('storage/'.$review->user->foto_profil) }}" style="width:40px; height:40px; border-radius:50%;" class="img-fluid me-2">
                                                      <div class="kanan">
                                                          <strong>{{ $review->user->name }}</strong><br>
                                                          @if($review->created_at)
                                                          <small><i class="bi bi-calendar"></i> {{ $review->created_at->format('d-M-Y')}}</small>
                                                      @endif
                                                    </div>
                                                </div>
                                                @for ($i = 1; $i <= $review->rating; $i++)
                                                <i class="bi bi-star-fill" style="color: #FFD700;"></i>
                                                @endfor
                                                @for ($i = $review->rating + 1; $i <= 5; $i++)
                                                <i class="bi bi-star" style="color: #FFD700;"></i>
                                                @endfor
                                                <p class="mb-3">{{ $review->comment }}</p>
                                               
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                @endif
                            </ul>
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
      const ulasanInput = document.getElementById('comment');

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
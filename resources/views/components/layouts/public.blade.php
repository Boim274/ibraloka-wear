<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="IbraLoka Wear - Local Luxury Fashion. Brand fashion lokal Indonesia dengan estetika luxury dan jiwa budaya Nusantara.">
    <title>@yield('title', config('app.name', 'IbraLoka Wear')) - Local Luxury Fashion</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <x-navbar />

    {{ $slot }}

    <x-footer />

    <x-toast />

    <x-auth-modal />

    <!-- Scroll to Top -->
    <button id="scrollTopBtn" onclick="scrollToTop()" style="position:fixed;bottom:30px;right:30px;z-index:999;width:48px;height:48px;border-radius:50%;background:var(--color-gold);border:none;color:var(--color-surface);font-size:20px;cursor:pointer;display:none;align-items:center;justify-content:center;box-shadow:0 4px 16px rgba(201,168,76,0.3);transition:all .3s" aria-label="Scroll to top">↑</button>

    @vite('resources/js/app.js')

    @stack('scripts')

    <script>
    function scrollToTop(){
      window.scrollTo({top:0,behavior:'smooth'});
    }

    document.addEventListener('DOMContentLoaded',function(){
      const sBtn=document.getElementById('scrollTopBtn');
      window.addEventListener('scroll',()=>{
        sBtn.style.display=window.scrollY>400?'flex':'none';
      });

      const observer=new IntersectionObserver(entries=>{
        entries.forEach(e=>{
          if(e.isIntersecting){e.target.classList.add('visible');observer.unobserve(e.target);}
        });
      },{threshold:0.1});
      document.querySelectorAll('.fade-up').forEach(el=>observer.observe(el));
      var navLinks=document.querySelectorAll('.nav-links > a:not(.dropdown-menu a), .mobile-nav a');
      var sections=document.querySelectorAll('section[id]');
      function updateActiveSection(){
        var cur='';
        sections.forEach(function(s){if(window.scrollY>=s.offsetTop-120)cur=s.id;});
        if(!cur){navLinks.forEach(function(a){a.classList.remove('active');});return;}
        navLinks.forEach(function(a){
          var href=a.getAttribute('href');
          a.classList.toggle('active',href && href.includes('#'+cur));
        });
      }
      if(sections.length){window.addEventListener('scroll',updateActiveSection);updateActiveSection();}
      document.querySelectorAll('a[href^="#"]').forEach(a=>{
        a.addEventListener('click',function(e){
          const t=document.querySelector(this.getAttribute('href'));
          if(t){e.preventDefault();t.scrollIntoView({behavior:'smooth'});}
        });
      });
    });
    </script>
</body>
</html>

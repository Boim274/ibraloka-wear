@php $message = session('success'); @endphp

@if ($message)
    <div id="toast" role="alert"
        style="position:fixed;top:78px;right:20px;z-index:99999;background:rgba(201,168,76,0.92);color:#000;padding:16px 24px;font-size:13px;font-weight:500;border-radius:2px;box-shadow:0 4px 24px rgba(0,0,0,0.35);max-width:400px;cursor:pointer;transform:translateX(120%);overflow:hidden;font-family:'Montserrat',sans-serif;letter-spacing:0.3px">
        <span>{{ $message }}</span>
        <div style="position:absolute;bottom:0;left:0;height:3px;background:rgba(0,0,0,0.25);width:100%;animation:toast-progress 4s linear forwards"></div>
    </div>
    <style>
        #toast { animation: toast-in 0.4s ease forwards; }
        #toast.out { animation: toast-out 0.3s ease forwards; }
        @keyframes toast-in { 0% { transform: translateX(120%); opacity:0; } 100% { transform: translateX(0); opacity:1; } }
        @keyframes toast-out { 0% { transform: translateX(0); opacity:1; } 100% { transform: translateX(120%); opacity:0; } }
        @keyframes toast-progress { 0% { width:100%; } 100% { width:0%; } }
    </style>
    <script>
        (function() {
            var t = document.getElementById('toast');
            if (!t) return;
            var timer = setTimeout(function() { d(t); }, 4000);
            t.addEventListener('click', function() { clearTimeout(timer); d(t); });
            function d(el) { el.classList.add('out'); setTimeout(function() { el.remove(); }, 300); }
        })();
    </script>
@endif

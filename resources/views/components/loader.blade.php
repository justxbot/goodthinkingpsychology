<div class="loader">
    <div class="logo-container" style="background-image: url('{{ asset("images/logo-colored.png") }}') ">

    </div>
    <script>
            window.addEventListener('load', function() {
      // Get the loader element
      var loader = document.querySelector('.loader');

      // Hide the loader
      setTimeout(() => {
        loader.opacity = 0;
        setTimeout(()=>{
            loader.style.display = 'none';
        },1000)
      }, 1000);
    });
    </script>
</div>

<div class="container">
   <div class="row justify-content-center mb-5">
      <div class="col-md-8">
         <h1 class="mb-5">{{ $materi->title }}</h1> 

         
        
         <article class="my-3 fs-5">
            {!! $materi->content !!}
         </article>
        

         <a href="/materi" class="d-block mt-5">Back</a>
        
      </div>
   </div>
</div>

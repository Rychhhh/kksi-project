<script>
  function HitData(url, data, type){
    return new Promise((resolve, reject) => {
      $.ajax({
        url: url,
        data: data,
        type: type,
        success: (response) =>{
          resolve(response)
        },
        error: (error) => {
          reject(error)
        }
      })
    });
  }
</script>
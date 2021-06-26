<template>
  <div>
    <div class="text-right mb-1">
   <span>Select Camera : <select id="videoSource" @change="switchCamera"></select></span>
   </div>
   <div class="qrcode-stream-background">
    <qrcode-stream @decode="onDecode" @init="onInit">
    </qrcode-stream>
  </div>
  <div class="mt-3 mb-2">
    <strong>Scan QR Code Yang Ada Pada Merchant Untuk Menggunakan Promo</strong>
  </div>


  <p class="error">{{ error }}</p>
  <p class="error" v-if="noFrontCamera">
    You don't seem to have a front camera on your device
  </p>
  <p class="error" v-if="noRearCamera">
    You don't seem to have a rear camera on your device
  </p>
</div>
</template>

<script>
  import { QrcodeStream, QrcodeDropZone, QrcodeCapture } from 'vue-qrcode-reader'

  export default {

    components: { QrcodeStream },
    props:['prefix'],
    data () {
      return {
       result: '',
       noFrontCamera:false,
       noRearCamera:false,
       error: ''
     }
   },
   created(){
    if (!navigator.mediaDevices || !navigator.mediaDevices.enumerateDevices) {
      console.log("enumerateDevices() not supported.");
      return;
    }

    navigator.mediaDevices.enumerateDevices()
    .then(function(devices) {
      var i = 1;
      devices.forEach(function(device) {
        if(device.kind === 'videoinput'){
          var option = document.createElement('option');
          option.value = device.deviceId;
          option.text = device.label || 'camera ' + (i + 1);
          document.querySelector('select#videoSource').appendChild(option);
          i++;
        }
      });
    }).catch(function(err) {
      console.log(err.name + ": " + err.message);
    });
  },
  methods: {
    onDecode (result) {
      this.result = result;
      if(confirm("Are you sure want to continue this transaction")){
      var merchant_link_arr = result.split("/");
      var merchant_link = merchant_link_arr[merchant_link_arr.length - 1];
      let self = this;
      let url = this.prefix+'/promo-scan';
      var kode_promo = document.getElementById('selected_promo').value;
      var amount = document.getElementById('poin-yang-ingin-digunakan').value;
      document.getElementById('loading-wrapper').style.display = "block";
      axios({
        method: 'post',
        url: url,
        responseType: 'json',
        data:{
          merchant_link : merchant_link,
          kode_promo : kode_promo,
          amount : amount
        },
      }).then(res => {
        document.getElementById('loading-wrapper').style.display = "none";
        if (res.data.success == true) {
          $('#myModal').modal('hide');
          $('#promo-'+kode_promo+" .promo-btn").addClass("disabled");
          $('#promo-'+kode_promo+" .promo-btn").html("Telah Digunakan");
          $('#promo-'+kode_promo+" .promo-btn").prop("disabled",true);
          alert('promo berhasil digunakan');
          location.reload();
        }else{
          alert(res.data.message);
        }
      })
       .catch(err => console.log(err));
      //  document.getElementById('loading-wrapper').style.display = "none";
      //window.open(result,'_blank');
      }
    },
    switchCamera (event) {
      this.camera = event.target.value;
    },
    async onInit (promise) {
      try {
        await promise
      } catch (error) {
        if (error.name === 'NotAllowedError') {
          this.error = "ERROR: you need to grant camera access permisson"
        } else if (error.name === 'NotFoundError') {
          this.error = "ERROR: no camera on this device"
        } else if (error.name === 'NotSupportedError') {
          this.error = "ERROR: secure context required (HTTPS, localhost)"
        } else if (error.name === 'NotReadableError') {
          this.error = "ERROR: is the camera already in use?"
        } else if (error.name === 'OverconstrainedError') {
          this.error = "ERROR: installed cameras are not suitable"
          console.log( navigator.mediaDevices.enumerateDevices());
        } else if (error.name === 'StreamApiNotSupportedError') {
          this.error = "ERROR: Stream API is not supported in this browser"
        }
      }
    }
  }
}
</script>

<style scoped>
.error {
  font-weight: bold;
  color: red;
}
</style>
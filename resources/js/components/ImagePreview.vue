<template>
  <div id="file-preview">
　　<div class="form-group">
　　　　<label class="form-label d-block p-1" for="photo_id">商品画像：</label>
　　　　<input class="form-input d-block p-1 mb-2" type="file" name="new-imagefile" id="new-imagefile" accept="image/*" v-on:change="onFileChange">
　　</div>
　　<img class="userInfo__icon preview-image-size" v-bind:src="imageData" v-if="imageData">
  </div>
</template>

<script>
export default {
  props : ['now-file-path'],
  data() {
    return {
      //画像格納用変数
      imageData: ''
    }
  },
  mounted () {
    console.log(this.nowFilePath);
    this.imageData = this.nowFilePath;
  },
  methods: {
    onFileChange(e) {
      const files = e.target.files;
      if(files.length > 0) {
        const file = files[0];
        const reader = new FileReader();
        reader.onload = (e) => {
          this.imageData = e.target.result;
        };
        reader.readAsDataURL(file);
      }
    }
  }
}
</script>

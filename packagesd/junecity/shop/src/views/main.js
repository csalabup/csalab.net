Vue.component('items', {

   template: '#items-template',

   props: ['list'],



   created(){

   	   this.list = JSON.parse(this.list);
   }
   
});


new Vue({

     el: 'body'
});
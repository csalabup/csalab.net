<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    </head>
    <body>
        
        <div class="container">
            <items></items>
        </div>
        
        
        <template id="items-template">
        <ul class="list-group">
            
            <li class="list-group-item" v-for="item in list">

            
               
                <img :src="item.thumb_url"  style="width:60px" class="img-rounded"/>
                <strong @click="deleteItems(item)">X</strong>
            </li>
            
        </ul>
        </template>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.16/vue.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.0/vue-resource.js"></script>
        
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.3.7/socket.io.min.js"></script>


        <script type="text/javascript">
          



        Vue.component('items', {
        template: '#items-template',
        data: function(){
           return {
                 list: []
                  };
            },


        created(){

            //this.fetchData();
            
        },

        methods: {
            


               fetchData: function(){

                this.$http.get('http://junecity.net:1234/api/v1/item', function(items){
                  
                  this.list = items;
                  
                 }.bind(this));


                }


             }
        
        });


        new Vue({

           http: {
                   root: 'http://junecity.net:1234/api/v1/item',
                   headers: {
                     Authorization: 'Basic aGVhdGhlckBqdW5lY2l0eS5jb206NWJpdDIwMzIteQ=='
                   }
                },

           el: 'body'

          });

        </script>
    </body>
</html>
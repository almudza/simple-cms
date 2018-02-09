<template>
    <div id="post-list">
        <h3><a :href="slug"> {{ title }}</a> </h3>
        
          <small> {{ created_at }}</small>
            <a href="" @click.prevent="likeIt">
                <small>{{ likeCount }} </small>
                <i class="fa fa-heart" v-if='likeCount == 0' area-hidden="true"></i>
                <i class="fa fa-heart" v-else='likeCount > 0' style="color:red" area-hidden="true"></i></a>
           
          <!-- <small class="pull-right"><i class="fa fa-tag"></i> {{ category }} </small> -->
    </div>
</template>

<script>
    export default {
        data(){
            return {
                likeCount:0
            }

        },
        props: [
            'title','created_at','postId','login','likes','slug'
        ],
        created(){
            this.likeCount = this.likes
        },
        methods:{
            likeIt(){
                if (this.login) {

                    axios.post('/saveLike',{
                        id : this.postId
                    })
                    .then(response => {
                        if (response.data == 'deleted') {

                            this.likeCount -=1;

                        } else {

                            this.likeCount +=1;
                            
                        }

                        // this.blog = response.data.data

                        // console.log(response);

                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                    
                } else {

                    window.location = 'login'
                }
            }
        }
    }
</script>

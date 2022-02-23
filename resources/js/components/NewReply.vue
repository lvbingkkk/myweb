<template>
    <div>
        <div v-if="signedIn">
            <div class="form-group" style="margin-top: 10px;">
    <!--            下面这个required什么意思？？-》带有必填文本区域的表单：-->
                    <textarea name="body"
                              id="body"
                              class="form-control"
                              placeholder="说点什么吧..."
                              rows="5"
                              required
                              v-model="body">
                    </textarea>
            </div>

            <button type="submit" class="btn btn-primary" @click="addReply">
                提交
            </button>
        </div>

        <p class="text-center" v-else>
            请先<a href="/login">登录</a>，然后再发表回复
        </p>

    </div>
</template>

<script>
    export default {
        // name: "NewReply"
        // props: ['endpoint'],
        data() {
            return {
                body:'',
                // endpoint:'/threads/Laravel/135/replies'
            };
        },

        computed: {
            signedIn() {
                return window.App.signIn;
            }
        },

        methods: {
            addReply() {

                if (!this.body) {
                    flash('回复的内容不能为空！！！','danger');
                    return;
                }
                //下面这个then不懂。。
                axios.post(location.pathname+'/replies', { body:this.body })
                    .catch(error => {
                        flash(error.response.data,'danger');
                    })
                    .then(({data}) => {
                        this.body = '';

                        flash('回复已提交！！');

                        this.$emit('created',data);
                    });
            }
        }

    }
</script>

<style scoped>

</style>

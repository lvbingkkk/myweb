<script>
    import replies from '../components/replies';
    import SubscribeButton from '../components/SubscribeButton';

    export default {
        props:['initialRepliesCount'],

        components:{replies,SubscribeButton},

        data() {
            return{
                repliesCount:this.initialRepliesCount
            }

        }
    }
</script>

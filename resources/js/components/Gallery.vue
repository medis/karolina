<template>
    <vue-w-masonry-gallery
            :imgsArr="imgsArr"
            src-key="medium"
            :gap="5"
            :imgWidth="300"
            :perPage="10"
            :reachBottomDistance="20"
            @scrollReachBottom="getData"
            @click="clickFn">
        <div class="img-info" slot-scope="props">
            <div class="bg" :style="{ backgroundColor: props.value.background_colour }"></div>
            <div class="text" :style="{ color: props.value.text_colour }">
                <h4 class="title" v-html="props.value.title"></h4>
            </div>
        </div>
    </vue-w-masonry-gallery>
</template>

<script>
    import VueWMasonryGallery from "vue-masonry-gallery";
    export default {
        data() {
            return {
                imgsArr: [],
                group: 0,
                bottomOfWindow: false
            };
        },
        components: {
            VueWMasonryGallery
        },
        methods: {
            getData() {
                var url = '/work?group=' + this.group;
                var cat = this.getUrlParameter('cat');
                if (cat.length) {
                    url += '&cat=' + cat;
                }
                axios
                    .get(url)
                    .then(res => {
                        this.imgsArr = this.imgsArr.concat(res.data);
                        this.group++;
                    });
            },
            clickFn(event, { index, value }) {
                // Prevent a tag jump
                event.preventDefault();
                window.location = value.href;
            },
            getDocHeight() {
                var D = document;
                return Math.max(
                    D.body.scrollHeight, D.documentElement.scrollHeight,
                    D.body.offsetHeight, D.documentElement.offsetHeight,
                    D.body.clientHeight, D.documentElement.clientHeight
                );
            },
            getUrlParameter(name) {
                name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
                var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
                var results = regex.exec(location.search);
                return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
            },
            scroll () {
                // var bottomOfWindow = false;
                var context = this;
                window.onscroll = () => {
                    let height = Math.max(
                        document.body.scrollHeight, document.documentElement.scrollHeight,
                        document.body.offsetHeight, document.documentElement.offsetHeight,
                        document.body.clientHeight, document.documentElement.clientHeight
                    );
                    context.bottomOfWindow = (window.innerHeight + window.pageYOffset) >= height - 2;
                }

                setInterval(function() {
                    if (context.bottomOfWindow) {
                        context.bottomOfWindow = false;
                        context.getData();
                    }
                }, 100);
            }
        },
        created() {
            this.getData();
        },
        mounted () {
            this.scroll()
        }
    }
</script>

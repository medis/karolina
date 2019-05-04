<template>
    <vue-w-masonry-gallery
            :imgsArr="imgsArr"
            src-key="medium"
            :gap="5"
            :imgWidth="400"
            @scrollReachBottom="getData"
            @click="clickFn">
        <div class="img-info" slot-scope="props">
            <div class="bg" :style="{ backgroundColor: props.value.background_colour }"></div>
            <div class="text" :style="{ color: props.value.text_colour }">
                <h2 class="title" v-html="props.value.title"></h2>
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
                group: 0
            };
        },
        components: {
            VueWMasonryGallery
        },
        methods: {
            getData() {
                axios
                    .get('/work?group=' + this.group)
                    .then(res => {
                        this.imgsArr = this.imgsArr.concat(res.data);
                        this.group++;
                    });
            },
            clickFn(event, { index, value }) {
                // Prevent a tag jump
                event.preventDefault();
                window.location = value.href;
            }
        },
        created() {
            this.getData();
        }
    }
</script>

import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler';
import ArticleLike from './components/ArticleLike.vue';
import FollowButton from './components/FollowButton.vue';
import ArticleTagsInput from './components/ArticleTagsInput.vue'

const app = createApp({
    components: {
        ArticleLike,
        ArticleTagsInput,
        FollowButton,
    }
});

app.mount("#app");

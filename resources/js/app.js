import './bootstrap';

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();
import { createApp } from 'vue/dist/vue.esm-bundler';
import ArticleLike from './components/ArticleLike.vue';
import FollowButton from './components/FollowButton.vue';
const app = createApp({
    components: {
        ArticleLike,
        FollowButton,
    }
});

app.mount("#app");

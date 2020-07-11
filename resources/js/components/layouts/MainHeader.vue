<template>
    <Navigations></Navigations>
</template>

<script>
import Navigations from "./nav/Navigations";

export default {
    name: `MainHeader`,
    data() {
        return {
            title: 'Main Header'
        }
    },
    components: {
        Navigations,
    }
};
</script>
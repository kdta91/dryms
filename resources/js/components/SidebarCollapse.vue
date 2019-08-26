<template>
    <div class="container">
        <button type="button" id="sidebarCollapse" class="btn btn-info" @click="sidebarCollapse">
            <i class="fas fa-align-left"></i>
            <span>Toggle Sidebar</span>
        </button>
    </div>
</template>

<script>
    export default {
        props: [],

        data: function () {
            return {
                collapse: false
            };
        },

        methods: {
            sidebarCollapse() {
                this.collapse = !this.collapse;
            }
        }
    }

</script>
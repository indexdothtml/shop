<template>
    <button
        class="btn"
        :type="type"
        :disabled="disabled"
        @click="click"
    >
        <slot></slot>
    </button>
</template>

<script>
    export default {
        name: 'ui-button',
        props: {
            type: {
                type: String,
                default: 'button'
            },
            disabled: {
                type: Boolean,
                default: false
            }
        },
        methods: {
            click () {
                this.$emit('click');
            }
        }
    }
</script>
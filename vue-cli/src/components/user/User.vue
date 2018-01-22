<template>
	<transition name="slide-fade">
		<router-view></router-view>
	</transition>
</template>

<script>
	export default {
		name: 'User'
	}
</script>

<style>
	.slide-fade-enter-active {
		transition: all .4s ease;
	}

	.slide-fade-leave-active {
		transition: all .4s cubic-bezier(1.0, 0.5, 0.8, 1.0);
	}
	
	.slide-fade-enter, .slide-fade-leave {
		transform: translateX(10px);
		opacity: 0;
	}
</style>
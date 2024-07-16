<template>
	<div></div>
</template>

<script>
	export default {
		name: "item-data",

		props: {
			chip: {
				type: String,
				default: "chip",
			},

			icon: {
				type: String,
				default: null,
			},

			showDelete: {
				type: Boolean,
				default: false,
			},

			subtitle: {
				type: String,
				default: "updated_at",
			},

			title: {
				type: String,
				default: "name",
			},

			value: {
				type: Object,
				default: () => ({}),
			},
		},
	};
</script>

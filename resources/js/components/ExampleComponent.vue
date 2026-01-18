<template>
    <div class="p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">
            {{ title }}
        </h2>
        <p class="text-gray-600">
            {{ message }}
        </p>
        <button 
            @click="count++"
            class="mt-4 px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md transition-colors"
        >
            Clicked {{ count }} times
        </button>
    </div>
</template>

<script>
export default {
    name: 'ExampleComponent',
    data() {
        return {
            title: 'Welcome to Transport App',
            message: 'This is a Vue.js component running inside Laravel with Blade templates.',
            count: 0
        }
    }
}
</script>

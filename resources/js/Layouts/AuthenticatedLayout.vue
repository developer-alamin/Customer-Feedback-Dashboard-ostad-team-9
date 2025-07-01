<script setup>
import AppHeader from "@/Components/AppHeader.vue";
import { Head } from '@inertiajs/vue3'
</script>

<template>
    <!-- Favicon icon -->
    <Head>
        <link rel="icon" type="image/png" href="/favicon.png" />
    </Head>

    <div>
        <div class="min-h-screen bg-[#F5F5F5]">
            <!-- App Header -->
            <AppHeader />

            <!-- Page Heading -->
            <header class="mt-10" v-if="$slots.header">
                <div class="mx-auto max-w-7xl border-b border-gray-300">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>

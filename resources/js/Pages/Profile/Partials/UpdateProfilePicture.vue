<script setup>
import { Head, router, useForm, usePage } from "@inertiajs/vue3";
import { computed, ref } from "vue";
import { UserPen } from "lucide-vue-next";

// Access page props
const page = usePage();
const user = computed(() => page.props.auth.user);
const profile = computed(() => page.props.profile);

// Refs for image preview
const imagePreview = ref(
    profile.value?.image
        ? `/storage/${profile.value.image}`
        : "/male-profile-avatar.png"
);

const fileInput = ref(null);

// Handle file input click
const triggerFileInput = () => {
    fileInput.value?.click();
};

// Handle file preview
function handleFileChange(event) {
    const file = event.target.files[0];
    if (!file) return;

    imageForm.image = file;

    // Image preview (for immediate UI feedback)
    const reader = new FileReader();
    reader.onload = (e) => {
        imagePreview.value = e.target.result;
    };
    reader.readAsDataURL(file);

    // Auto submit after selecting file
    submitImage();
}

// Image Upload Form
const imageForm = useForm({
    image: null,
});

// Submit image upload
function submitImage() {
    imageForm.post(route("profile.image.update"), {
        preserveScroll: true,
        onSuccess: () => {
            fileInput.value.value = null;
        },
    });
}
</script>

<template>
    <section class="w-full py-1">
        <form @submit.prevent="submitImage">
            <div class="flex items-center justify-center">
                <div class="m-5">
                    <img
                        class="h-48 w-48 rounded-full object-cover p-1 ring-2 ring-white shadow-lg dark:ring-indigo-500"
                        :src="imagePreview"
                        alt="Profile Picture"
                    />
                </div>
                <div class="flex-1">
                    <h1 class="text-2xl font-semibold">
                        {{ user.name }}
                    </h1>
                    <p class="text-md text-gray-900">
                        {{ user.email }}
                    </p>
                    <div class="mt-2 flex items-center">
                        <button
                            @click="triggerFileInput"
                            class="flex items-center justify-center text-md cursor-pointer rounded-md border border-gray-300 bg-white px-4 py-2 text-green-700 hover:bg-green-700 hover:text-white font-semibold"
                        >
                            <UserPen class="mr-2 h-5 w-5" /> Change Profile
                            Picture
                        </button>

                        <!-- Hidden File Input -->
                        <input
                            ref="fileInput"
                            type="file"
                            accept="image/*"
                            hidden
                            @change="handleFileChange"
                        />
                    </div>
                </div>
            </div>
        </form>
    </section>
</template>
<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DeleteUserForm from "./Partials/DeleteUserForm.vue";
import UpdatePasswordForm from "./Partials/UpdatePasswordForm.vue";
import UpdateProfileInformationForm from "./Partials/UpdateProfileInformationForm.vue";
import UpdateProfilePicture from "./Partials/UpdateProfilePicture.vue";
import { Head } from "@inertiajs/vue3";

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <!-- Page Header -->
        <template #header>
            <h2 class="text-2xl font-semibold leading-tight text-gray-800">
                Profile Settings
            </h2>
            <p class="text-md mt-1 text-gray-500">
                Manage your profile and account settings, including name, contact details, profile picture and other information securely and efficiently.
            </p>
        </template>

        <!-- Page Content -->
        <div class="py-12">
            <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
                <!-- Profile Image & delete user -->
                <div class="flex items-center justify-between gap-10">
                    <div class="overflow-hidden w-1/2">
                        <UpdateProfilePicture />
                    </div>

                    <div
                        class="rounded-md bg-white px-6 py-4 dark:border-red-200/10 dark:bg-red-700/10 w-1/2 shadow-md"
                    >
                        <DeleteUserForm class="max-w-xl" />
                    </div>
                </div>

                <!-- Update Profile Information & Change Password -->
                <div class="flex items-center justify-between gap-10">
                    <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8 w-1/2">
                        <UpdateProfileInformationForm
                            :must-verify-email="mustVerifyEmail"
                            :status="status"
                            class="max-w-xl"
                        />
                    </div>
                    <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8 w-1/2">
                        <UpdatePasswordForm class="max-w-xl" />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
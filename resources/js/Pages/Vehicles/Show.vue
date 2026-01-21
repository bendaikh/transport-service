<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    vehicle: Object
});

const form = useForm({});

function deleteVehicle() {
    if (confirm('Êtes-vous sûr de vouloir supprimer ce véhicule ?')) {
        form.delete(route('vehicles.destroy', props.vehicle.id));
    }
}

const statusLabels = {
    active: { label: 'Actif', class: 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' },
    inactive: { label: 'Inactif', class: 'bg-slate-100 text-slate-800 dark:bg-slate-700 dark:text-slate-300' },
    maintenance: { label: 'Maintenance', class: 'bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-400' },
    rented: { label: 'Loué', class: 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400' },
};
</script>

<template>
    <Head :title="`Véhicule ${vehicle.registration}`" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div class="flex items-center gap-4">
                    <Link :href="route('vehicles.index')" class="p-2 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition">
                        <svg class="w-5 h-5 text-slate-500 dark:text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </Link>
                    <div>
                        <h2 class="text-xl sm:text-2xl font-bold text-slate-800 dark:text-white">
                            {{ vehicle.registration }}
                        </h2>
                        <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">
                            {{ vehicle.brand }} {{ vehicle.model }}
                        </p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <Link
                        :href="route('vehicles.edit', vehicle.id)"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-amber-500 hover:bg-amber-600 text-white rounded-xl font-medium text-sm transition"
                    >
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Modifier
                    </Link>
                    <button
                        @click="deleteVehicle"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-xl font-medium text-sm transition"
                    >
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Supprimer
                    </button>
                </div>
            </div>
        </template>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Info Card -->
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-slate-200 dark:border-slate-700">
                        <h3 class="text-lg font-bold text-slate-800 dark:text-white">Informations du Véhicule</h3>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div v-if="vehicle.code">
                                <label class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Code véhicule</label>
                                <p class="mt-1 text-lg font-medium text-slate-800 dark:text-white">{{ vehicle.code }}</p>
                            </div>
                            <div>
                                <label class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Immatriculation</label>
                                <p class="mt-1 text-lg font-bold text-slate-800 dark:text-white">{{ vehicle.registration }}</p>
                            </div>
                            <div>
                                <label class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Type</label>
                                <p class="mt-1 text-lg font-medium text-slate-800 dark:text-white">{{ vehicle.type }}</p>
                            </div>
                            <div>
                                <label class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Marque</label>
                                <p class="mt-1 text-lg font-medium text-slate-800 dark:text-white">{{ vehicle.brand }}</p>
                            </div>
                            <div>
                                <label class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Modèle</label>
                                <p class="mt-1 text-lg font-medium text-slate-800 dark:text-white">{{ vehicle.model }}</p>
                            </div>
                            <div v-if="vehicle.category">
                                <label class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Catégorie</label>
                                <p class="mt-1 text-lg font-medium text-slate-800 dark:text-white">{{ vehicle.category }}</p>
                            </div>
                            <div v-if="vehicle.color">
                                <label class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Couleur</label>
                                <p class="mt-1 text-lg font-medium text-slate-800 dark:text-white">{{ vehicle.color }}</p>
                            </div>
                            <div v-if="vehicle.fuel_type">
                                <label class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Type carburant</label>
                                <p class="mt-1 text-lg font-medium text-slate-800 dark:text-white">{{ vehicle.fuel_type }}</p>
                            </div>
                            <div v-if="vehicle.power !== null && vehicle.power !== undefined">
                                <label class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Puissance</label>
                                <p class="mt-1 text-lg font-medium text-slate-800 dark:text-white">{{ vehicle.power }}</p>
                            </div>
                            <div>
                                <label class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Capacité</label>
                                <p class="mt-1 text-lg font-medium text-slate-800 dark:text-white">{{ vehicle.capacity }} places</p>
                            </div>
                            <div>
                                <label class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Date Mise en Service</label>
                                <p class="mt-1 text-lg font-medium text-slate-800 dark:text-white">{{ new Date(vehicle.service_date).toLocaleDateString('fr-FR') }}</p>
                            </div>
                        </div>
                        <div class="mt-6" v-if="vehicle.description">
                            <label class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Description</label>
                            <p class="mt-1 text-slate-600 dark:text-slate-300">{{ vehicle.description }}</p>
                        </div>
                        <div class="mt-6" v-if="vehicle.usage_status || vehicle.rental_amount || vehicle.next_service_km || vehicle.extra_info">
                            <h4 class="text-sm font-bold text-slate-800 dark:text-white mb-3">Informations d'utilisation</h4>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div v-if="vehicle.usage_status">
                                    <label class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Statut d'utilisation</label>
                                    <p class="mt-1 text-slate-700 dark:text-slate-200">{{ vehicle.usage_status }}</p>
                                </div>
                                <div v-if="vehicle.rental_amount">
                                    <label class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Montant (Traite / Location)</label>
                                    <p class="mt-1 text-slate-700 dark:text-slate-200 font-medium">{{ Number(vehicle.rental_amount).toLocaleString('fr-FR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) }} DHS</p>
                                </div>
                                <div v-if="vehicle.next_service_km !== null && vehicle.next_service_km !== undefined">
                                    <label class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Km prochain vidange</label>
                                    <p class="mt-1 text-slate-700 dark:text-slate-200">{{ vehicle.next_service_km }}</p>
                                </div>
                                <div>
                                    <label class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Affectation</label>
                                    <p class="mt-1 text-slate-700 dark:text-slate-200">{{ vehicle.assigned ? 'Oui' : 'Non' }}</p>
                                </div>
                            </div>
                            <div class="mt-4" v-if="vehicle.extra_info">
                                <label class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Informations supplémentaires</label>
                                <p class="mt-1 text-slate-600 dark:text-slate-300 whitespace-pre-line">{{ vehicle.extra_info }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fiche papiers véhicule -->
                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-slate-200 dark:border-slate-700">
                        <h3 class="text-lg font-bold text-slate-800 dark:text-white">Fiche Papiers Véhicule</h3>
                    </div>
                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                        <!-- Helper component style blocks -->
                        <section class="border border-slate-200 dark:border-slate-700 rounded-xl p-4">
                            <h4 class="text-sm font-bold text-amber-500 mb-3 uppercase tracking-wide">Assurance</h4>
                            <div class="space-y-2 text-sm">
                                <p><span class="font-semibold text-slate-600 dark:text-slate-300">Période:</span>
                                    <span class="ml-1 text-slate-700 dark:text-slate-200">
                                        {{ vehicle.insurance_start_date ? new Date(vehicle.insurance_start_date).toLocaleDateString('fr-FR') : '-' }}
                                        <span> → </span>
                                        {{ vehicle.insurance_end_date ? new Date(vehicle.insurance_end_date).toLocaleDateString('fr-FR') : '-' }}
                                    </span>
                                </p>
                                <p v-if="vehicle.insurance_company"><span class="font-semibold text-slate-600 dark:text-slate-300">Organisme:</span> {{ vehicle.insurance_company }}</p>
                                <p><span class="font-semibold text-slate-600 dark:text-slate-300">Montant:</span>
                                    <span class="ml-1">
                                        {{ vehicle.insurance_amount ? Number(vehicle.insurance_amount).toLocaleString('fr-FR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' DHS' : '-' }}
                                    </span>
                                </p>
                                <p><span class="font-semibold text-slate-600 dark:text-slate-300">Validité:</span>
                                    <span class="ml-1">{{ vehicle.insurance_validity_days ?? '-' }} jours</span>
                                </p>
                                <p><span class="font-semibold text-slate-600 dark:text-slate-300">Charge journalière:</span>
                                    <span class="ml-1">
                                        {{ vehicle.insurance_daily_charge ? Number(vehicle.insurance_daily_charge).toLocaleString('fr-FR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' DHS' : '-' }}
                                    </span>
                                </p>
                            </div>
                        </section>

                        <section class="border border-slate-200 dark:border-slate-700 rounded-xl p-4">
                            <h4 class="text-sm font-bold text-amber-500 mb-3 uppercase tracking-wide">Visite Technique</h4>
                            <div class="space-y-2 text-sm">
                                <p><span class="font-semibold text-slate-600 dark:text-slate-300">Période:</span>
                                    <span class="ml-1 text-slate-700 dark:text-slate-200">
                                        {{ vehicle.technical_start_date ? new Date(vehicle.technical_start_date).toLocaleDateString('fr-FR') : '-' }}
                                        <span> → </span>
                                        {{ vehicle.technical_end_date ? new Date(vehicle.technical_end_date).toLocaleDateString('fr-FR') : '-' }}
                                    </span>
                                </p>
                                <p><span class="font-semibold text-slate-600 dark:text-slate-300">Montant:</span>
                                    <span class="ml-1">
                                        {{ vehicle.technical_amount ? Number(vehicle.technical_amount).toLocaleString('fr-FR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' DHS' : '-' }}
                                    </span>
                                </p>
                                <p><span class="font-semibold text-slate-600 dark:text-slate-300">Validité:</span>
                                    <span class="ml-1">{{ vehicle.technical_validity_days ?? '-' }} jours</span>
                                </p>
                                <p><span class="font-semibold text-slate-600 dark:text-slate-300">Charge journalière:</span>
                                    <span class="ml-1">
                                        {{ vehicle.technical_daily_charge ? Number(vehicle.technical_daily_charge).toLocaleString('fr-FR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' DHS' : '-' }}
                                    </span>
                                </p>
                            </div>
                        </section>

                        <section class="border border-slate-200 dark:border-slate-700 rounded-xl p-4">
                            <h4 class="text-sm font-bold text-amber-500 mb-3 uppercase tracking-wide">Vignette</h4>
                            <div class="space-y-2 text-sm">
                                <p><span class="font-semibold text-slate-600 dark:text-slate-300">Période:</span>
                                    <span class="ml-1 text-slate-700 dark:text-slate-200">
                                        {{ vehicle.vignette_start_date ? new Date(vehicle.vignette_start_date).toLocaleDateString('fr-FR') : '-' }}
                                        <span> → </span>
                                        {{ vehicle.vignette_end_date ? new Date(vehicle.vignette_end_date).toLocaleDateString('fr-FR') : '-' }}
                                    </span>
                                </p>
                                <p><span class="font-semibold text-slate-600 dark:text-slate-300">Montant:</span>
                                    <span class="ml-1">
                                        {{ vehicle.vignette_amount ? Number(vehicle.vignette_amount).toLocaleString('fr-FR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' DHS' : '-' }}
                                    </span>
                                </p>
                                <p><span class="font-semibold text-slate-600 dark:text-slate-300">Validité:</span>
                                    <span class="ml-1">{{ vehicle.vignette_validity_days ?? '-' }} jours</span>
                                </p>
                                <p><span class="font-semibold text-slate-600 dark:text-slate-300">Charge journalière:</span>
                                    <span class="ml-1">
                                        {{ vehicle.vignette_daily_charge ? Number(vehicle.vignette_daily_charge).toLocaleString('fr-FR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' DHS' : '-' }}
                                    </span>
                                </p>
                            </div>
                        </section>

                        <section class="border border-slate-200 dark:border-slate-700 rounded-xl p-4">
                            <h4 class="text-sm font-bold text-amber-500 mb-3 uppercase tracking-wide">Carte Grise</h4>
                            <div class="space-y-2 text-sm">
                                <p><span class="font-semibold text-slate-600 dark:text-slate-300">Période:</span>
                                    <span class="ml-1 text-slate-700 dark:text-slate-200">
                                        {{ vehicle.carte_grise_start_date ? new Date(vehicle.carte_grise_start_date).toLocaleDateString('fr-FR') : '-' }}
                                        <span> → </span>
                                        {{ vehicle.carte_grise_end_date ? new Date(vehicle.carte_grise_end_date).toLocaleDateString('fr-FR') : '-' }}
                                    </span>
                                </p>
                                <p><span class="font-semibold text-slate-600 dark:text-slate-300">Montant:</span>
                                    <span class="ml-1">
                                        {{ vehicle.carte_grise_amount ? Number(vehicle.carte_grise_amount).toLocaleString('fr-FR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' DHS' : '-' }}
                                    </span>
                                </p>
                                <p><span class="font-semibold text-slate-600 dark:text-slate-300">Validité:</span>
                                    <span class="ml-1">{{ vehicle.carte_grise_validity_days ?? '-' }} jours</span>
                                </p>
                                <p><span class="font-semibold text-slate-600 dark:text-slate-300">Charge journalière:</span>
                                    <span class="ml-1">
                                        {{ vehicle.carte_grise_daily_charge ? Number(vehicle.carte_grise_daily_charge).toLocaleString('fr-FR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' DHS' : '-' }}
                                    </span>
                                </p>
                            </div>
                        </section>

                        <section class="border border-slate-200 dark:border-slate-700 rounded-xl p-4">
                            <h4 class="text-sm font-bold text-amber-500 mb-3 uppercase tracking-wide">Autorisation</h4>
                            <div class="space-y-2 text-sm">
                                <p><span class="font-semibold text-slate-600 dark:text-slate-300">Période:</span>
                                    <span class="ml-1 text-slate-700 dark:text-slate-200">
                                        {{ vehicle.autorisation_start_date ? new Date(vehicle.autorisation_start_date).toLocaleDateString('fr-FR') : '-' }}
                                        <span> → </span>
                                        {{ vehicle.autorisation_end_date ? new Date(vehicle.autorisation_end_date).toLocaleDateString('fr-FR') : '-' }}
                                    </span>
                                </p>
                                <p><span class="font-semibold text-slate-600 dark:text-slate-300">Montant:</span>
                                    <span class="ml-1">
                                        {{ vehicle.autorisation_amount ? Number(vehicle.autorisation_amount).toLocaleString('fr-FR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' DHS' : '-' }}
                                    </span>
                                </p>
                                <p><span class="font-semibold text-slate-600 dark:text-slate-300">Validité:</span>
                                    <span class="ml-1">{{ vehicle.autorisation_validity_days ?? '-' }} jours</span>
                                </p>
                                <p><span class="font-semibold text-slate-600 dark:text-slate-300">Charge journalière:</span>
                                    <span class="ml-1">
                                        {{ vehicle.autorisation_daily_charge ? Number(vehicle.autorisation_daily_charge).toLocaleString('fr-FR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' DHS' : '-' }}
                                    </span>
                                </p>
                            </div>
                        </section>

                        <section class="border border-slate-200 dark:border-slate-700 rounded-xl p-4">
                            <h4 class="text-sm font-bold text-amber-500 mb-3 uppercase tracking-wide">Mouchards</h4>
                            <div class="space-y-2 text-sm">
                                <p><span class="font-semibold text-slate-600 dark:text-slate-300">Période:</span>
                                    <span class="ml-1 text-slate-700 dark:text-slate-200">
                                        {{ vehicle.mouchard_start_date ? new Date(vehicle.mouchard_start_date).toLocaleDateString('fr-FR') : '-' }}
                                        <span> → </span>
                                        {{ vehicle.mouchard_end_date ? new Date(vehicle.mouchard_end_date).toLocaleDateString('fr-FR') : '-' }}
                                    </span>
                                </p>
                                <p><span class="font-semibold text-slate-600 dark:text-slate-300">Montant:</span>
                                    <span class="ml-1">
                                        {{ vehicle.mouchard_amount ? Number(vehicle.mouchard_amount).toLocaleString('fr-FR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' DHS' : '-' }}
                                    </span>
                                </p>
                                <p><span class="font-semibold text-slate-600 dark:text-slate-300">Validité:</span>
                                    <span class="ml-1">{{ vehicle.mouchard_validity_days ?? '-' }} jours</span>
                                </p>
                                <p><span class="font-semibold text-slate-600 dark:text-slate-300">Charge journalière:</span>
                                    <span class="ml-1">
                                        {{ vehicle.mouchard_daily_charge ? Number(vehicle.mouchard_daily_charge).toLocaleString('fr-FR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' DHS' : '-' }}
                                    </span>
                                </p>
                            </div>
                        </section>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Status Card -->
                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm p-6">
                    <h3 class="text-sm font-bold text-slate-800 dark:text-white mb-4">Statut Actuel</h3>
                    <div class="flex items-center gap-3">
                        <div :class="[
                            'w-12 h-12 rounded-xl flex items-center justify-center',
                            vehicle.status === 'active' ? 'bg-green-100 dark:bg-green-900/30' : '',
                            vehicle.status === 'inactive' ? 'bg-slate-100 dark:bg-slate-700' : '',
                            vehicle.status === 'maintenance' ? 'bg-amber-100 dark:bg-amber-900/30' : '',
                            vehicle.status === 'rented' ? 'bg-blue-100 dark:bg-blue-900/30' : '',
                        ]">
                            <svg :class="[
                                'w-6 h-6',
                                vehicle.status === 'active' ? 'text-green-600 dark:text-green-400' : '',
                                vehicle.status === 'inactive' ? 'text-slate-600 dark:text-slate-400' : '',
                                vehicle.status === 'maintenance' ? 'text-amber-600 dark:text-amber-400' : '',
                                vehicle.status === 'rented' ? 'text-blue-600 dark:text-blue-400' : '',
                            ]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path v-if="vehicle.status === 'active'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                <path v-else-if="vehicle.status === 'inactive'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                                <path v-else-if="vehicle.status === 'maintenance'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                            </svg>
                        </div>
                        <div>
                            <span :class="['px-3 py-1 rounded-full text-sm font-semibold', statusLabels[vehicle.status]?.class]">
                                {{ statusLabels[vehicle.status]?.label }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm p-6">
                    <h3 class="text-sm font-bold text-slate-800 dark:text-white mb-4">Statistiques Rapides</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-slate-500 dark:text-slate-400 text-sm">Affectations</span>
                            <span class="font-bold text-slate-800 dark:text-white">0</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-slate-500 dark:text-slate-400 text-sm">Consommation Carburant</span>
                            <span class="font-bold text-slate-800 dark:text-white">0 L</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-slate-500 dark:text-slate-400 text-sm">Total Charges</span>
                            <span class="font-bold text-slate-800 dark:text-white">0 DHS</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-slate-500 dark:text-slate-400 text-sm">Total Revenus</span>
                            <span class="font-bold text-slate-800 dark:text-white">0 DHS</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

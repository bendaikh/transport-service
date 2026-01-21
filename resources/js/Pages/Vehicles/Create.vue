<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';

const form = useForm({
    // Informations de base
    code: '',
    registration: '',
    brand: '',
    model: '',
    category: '',
    color: '',
    fuel_type: '',
    power: '',
    capacity: '',
    service_date: '',
    status: 'active',
    type: '',
    description: '',

    // Utilisation
    usage_status: '',
    rental_amount: '',
    assigned: false,
    next_service_km: '',
    extra_info: '',

    // Assurance
    insurance_start_date: '',
    insurance_end_date: '',
    insurance_amount: '',
    insurance_company: '',
    insurance_validity_days: '',
    insurance_daily_charge: '',

    // Visite technique
    technical_start_date: '',
    technical_end_date: '',
    technical_amount: '',
    technical_validity_days: '',
    technical_daily_charge: '',

    // Vignette
    vignette_start_date: '',
    vignette_end_date: '',
    vignette_amount: '',
    vignette_validity_days: '',
    vignette_daily_charge: '',

    // Carte grise
    carte_grise_start_date: '',
    carte_grise_end_date: '',
    carte_grise_amount: '',
    carte_grise_validity_days: '',
    carte_grise_daily_charge: '',

    // Autorisation
    autorisation_start_date: '',
    autorisation_end_date: '',
    autorisation_amount: '',
    autorisation_validity_days: '',
    autorisation_daily_charge: '',

    // Mouchards
    mouchard_start_date: '',
    mouchard_end_date: '',
    mouchard_amount: '',
    mouchard_validity_days: '',
    mouchard_daily_charge: '',
});

const submit = () => {
    form.post(route('vehicles.store'));
};

const vehicleTypes = ['Bus', 'Van', 'Camion', 'Minibus', 'Voiture', 'Autre'];
</script>

<template>
    <Head title="Ajouter un Véhicule" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center gap-4">
                <Link :href="route('vehicles.index')" class="p-2 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition">
                    <svg class="w-5 h-5 text-slate-500 dark:text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </Link>
                <div>
                    <h2 class="text-xl sm:text-2xl font-bold text-slate-800 dark:text-white">
                        Nouveau Véhicule
                    </h2>
                    <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">
                        Ajoutez un nouveau véhicule à votre flotte.
                    </p>
                </div>
            </div>
        </template>

        <div class="max-w-3xl">
            <form @submit.prevent="submit" class="space-y-6">
                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-slate-200 dark:border-slate-700">
                        <h3 class="text-lg font-bold text-slate-800 dark:text-white">Informations de Base</h3>
                        <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">Entrez les informations principales du véhicule.</p>
                    </div>
                    <div class="p-6 space-y-6">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Code véhicule</label>
                                <input 
                                    v-model="form.code" 
                                    type="text" 
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" 
                                />
                                <p v-if="form.errors.code" class="text-red-500 text-sm mt-1">{{ form.errors.code }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Immatriculation *</label>
                                <input 
                                    v-model="form.registration" 
                                    type="text" 
                                    placeholder="ex: 12345-A-67"
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" 
                                    required 
                                />
                                <p v-if="form.errors.registration" class="text-red-500 text-sm mt-1">{{ form.errors.registration }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Type de véhicule *</label>
                                <select 
                                    v-model="form.type" 
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                    required
                                >
                                    <option value="">Sélectionner un type</option>
                                    <option v-for="type in vehicleTypes" :key="type" :value="type">{{ type }}</option>
                                </select>
                                <p v-if="form.errors.type" class="text-red-500 text-sm mt-1">{{ form.errors.type }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Marque *</label>
                                <input 
                                    v-model="form.brand" 
                                    type="text" 
                                    placeholder="ex: Mercedes, Toyota..."
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" 
                                    required 
                                />
                                <p v-if="form.errors.brand" class="text-red-500 text-sm mt-1">{{ form.errors.brand }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Modèle *</label>
                                <input 
                                    v-model="form.model" 
                                    type="text" 
                                    placeholder="ex: Sprinter, Hiace..."
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" 
                                    required 
                                />
                                <p v-if="form.errors.model" class="text-red-500 text-sm mt-1">{{ form.errors.model }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Catégorie</label>
                                <input 
                                    v-model="form.category" 
                                    type="text" 
                                    placeholder="ex: A, B, C..."
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" 
                                />
                                <p v-if="form.errors.category" class="text-red-500 text-sm mt-1">{{ form.errors.category }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Couleur</label>
                                <input 
                                    v-model="form.color" 
                                    type="text" 
                                    placeholder="ex: Blanc, Scolaire..."
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" 
                                />
                                <p v-if="form.errors.color" class="text-red-500 text-sm mt-1">{{ form.errors.color }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Type carburant</label>
                                <input 
                                    v-model="form.fuel_type" 
                                    type="text" 
                                    placeholder="ex: Diesel, Essence..."
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" 
                                />
                                <p v-if="form.errors.fuel_type" class="text-red-500 text-sm mt-1">{{ form.errors.fuel_type }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Puissance</label>
                                <input 
                                    v-model="form.power" 
                                    type="number" 
                                    min="0"
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" 
                                />
                                <p v-if="form.errors.power" class="text-red-500 text-sm mt-1">{{ form.errors.power }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Capacité (places) *</label>
                                <input 
                                    v-model="form.capacity" 
                                    type="number" 
                                    min="1"
                                    placeholder="ex: 50"
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" 
                                    required 
                                />
                                <p v-if="form.errors.capacity" class="text-red-500 text-sm mt-1">{{ form.errors.capacity }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Date mise en service *</label>
                                <input 
                                    v-model="form.service_date" 
                                    type="date" 
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" 
                                    required 
                                />
                                <p v-if="form.errors.service_date" class="text-red-500 text-sm mt-1">{{ form.errors.service_date }}</p>
                            </div>

                            <div class="sm:col-span-2">
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">État initial</label>
                                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                                    <label 
                                        v-for="status in [
                                            { value: 'active', label: 'Actif', color: 'border-green-500 bg-green-50 dark:bg-green-900/20' },
                                            { value: 'inactive', label: 'Inactif', color: 'border-slate-500 bg-slate-50 dark:bg-slate-700' },
                                            { value: 'maintenance', label: 'Maintenance', color: 'border-amber-500 bg-amber-50 dark:bg-amber-900/20' },
                                            { value: 'rented', label: 'Loué', color: 'border-blue-500 bg-blue-50 dark:bg-blue-900/20' }
                                        ]"
                                        :key="status.value"
                                        :class="[
                                            'flex items-center justify-center px-4 py-3 rounded-xl border-2 cursor-pointer transition',
                                            form.status === status.value ? status.color : 'border-slate-200 dark:border-slate-600 hover:border-slate-300'
                                        ]"
                                    >
                                        <input type="radio" v-model="form.status" :value="status.value" class="sr-only" />
                                        <span :class="['text-sm font-medium', form.status === status.value ? 'text-slate-800 dark:text-white' : 'text-slate-500 dark:text-slate-400']">
                                            {{ status.label }}
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-slate-200 dark:border-slate-700">
                        <h3 class="text-lg font-bold text-slate-800 dark:text-white">Informations d'Utilisation</h3>
                    </div>
                    <div class="p-6 space-y-6">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Statut d'utilisation</label>
                                <input 
                                    v-model="form.usage_status" 
                                    type="text" 
                                    placeholder="ex: Location, Service scolaire..."
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" 
                                />
                                <p v-if="form.errors.usage_status" class="text-red-500 text-sm mt-1">{{ form.errors.usage_status }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Montant (Traite / Location)</label>
                                <div class="relative">
                                    <input 
                                        v-model="form.rental_amount" 
                                        type="number" 
                                        min="0"
                                        step="0.01"
                                        class="w-full pl-4 pr-14 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" 
                                    />
                                    <span class="absolute inset-y-0 right-4 flex items-center text-xs font-semibold text-slate-400">DHS</span>
                                </div>
                                <p v-if="form.errors.rental_amount" class="text-red-500 text-sm mt-1">{{ form.errors.rental_amount }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Affectation</label>
                                <div class="flex items-center gap-3">
                                    <button
                                        type="button"
                                        @click="form.assigned = !form.assigned"
                                        :class="[
                                            'relative inline-flex h-6 w-11 items-center rounded-full transition',
                                            form.assigned ? 'bg-green-500' : 'bg-slate-300 dark:bg-slate-600'
                                        ]"
                                    >
                                        <span
                                            :class="[
                                                'inline-block h-5 w-5 transform rounded-full bg-white shadow transition',
                                                form.assigned ? 'translate-x-5' : 'translate-x-1'
                                            ]"
                                        />
                                    </button>
                                    <span class="text-sm text-slate-700 dark:text-slate-300">
                                        {{ form.assigned ? 'Oui' : 'Non' }}
                                    </span>
                                </div>
                                <p v-if="form.errors.assigned" class="text-red-500 text-sm mt-1">{{ form.errors.assigned }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Km prochain vidange</label>
                                <input 
                                    v-model="form.next_service_km" 
                                    type="number" 
                                    min="0"
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" 
                                />
                                <p v-if="form.errors.next_service_km" class="text-red-500 text-sm mt-1">{{ form.errors.next_service_km }}</p>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Description / Notes</label>
                            <textarea 
                                v-model="form.description" 
                                rows="3" 
                                placeholder="Ajoutez des notes ou une description pour ce véhicule..."
                                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition resize-none"
                            ></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Informations supplémentaires</label>
                            <textarea 
                                v-model="form.extra_info" 
                                rows="3" 
                                placeholder="Infos supplémentaires (STE, remarques, ...)"
                                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition resize-none"
                            ></textarea>
                            <p v-if="form.errors.extra_info" class="text-red-500 text-sm mt-1">{{ form.errors.extra_info }}</p>
                        </div>
                    </div>
                </div>

                <!-- Fiche papiers véhicule -->
                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-slate-200 dark:border-slate-700">
                        <h3 class="text-lg font-bold text-slate-800 dark:text-white">Fiche Papiers Véhicule</h3>
                        <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">
                            Saisissez les informations d'assurance, visite technique, vignette, carte grise, autorisation et mouchards.
                        </p>
                    </div>
                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                        <!-- Assurance -->
                        <section class="border border-slate-200 dark:border-slate-700 rounded-xl p-4">
                            <h4 class="text-sm font-bold text-amber-500 mb-3 uppercase tracking-wide">Assurance</h4>
                            <div class="space-y-3">
                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-500 mb-1">Date début</label>
                                        <input v-model="form.insurance_start_date" type="date" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-xs" />
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-500 mb-1">Date fin</label>
                                        <input v-model="form.insurance_end_date" type="date" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-xs" />
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-slate-500 mb-1">Organisme</label>
                                    <input v-model="form.insurance_company" type="text" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-xs" />
                                </div>
                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-500 mb-1">Montant charge</label>
                                        <input v-model="form.insurance_amount" type="number" min="0" step="0.01" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-xs" />
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-500 mb-1">Durée validité (jours)</label>
                                        <input v-model="form.insurance_validity_days" type="number" min="0" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-xs" />
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-slate-500 mb-1">Charge journalière</label>
                                    <input v-model="form.insurance_daily_charge" type="number" min="0" step="0.01" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-xs" />
                                </div>
                            </div>
                        </section>

                        <!-- Visite technique -->
                        <section class="border border-slate-200 dark:border-slate-700 rounded-xl p-4">
                            <h4 class="text-sm font-bold text-amber-500 mb-3 uppercase tracking-wide">Visite Technique</h4>
                            <div class="space-y-3">
                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-500 mb-1">Date début</label>
                                        <input v-model="form.technical_start_date" type="date" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-xs" />
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-500 mb-1">Date fin</label>
                                        <input v-model="form.technical_end_date" type="date" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-xs" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-500 mb-1">Montant charge</label>
                                        <input v-model="form.technical_amount" type="number" min="0" step="0.01" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-xs" />
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-500 mb-1">Validité (jours)</label>
                                        <input v-model="form.technical_validity_days" type="number" min="0" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-xs" />
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-slate-500 mb-1">Charge journalière</label>
                                    <input v-model="form.technical_daily_charge" type="number" min="0" step="0.01" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-xs" />
                                </div>
                            </div>
                        </section>

                        <!-- Vignette -->
                        <section class="border border-slate-200 dark:border-slate-700 rounded-xl p-4">
                            <h4 class="text-sm font-bold text-amber-500 mb-3 uppercase tracking-wide">Vignette</h4>
                            <div class="space-y-3">
                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-500 mb-1">Date début</label>
                                        <input v-model="form.vignette_start_date" type="date" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-xs" />
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-500 mb-1">Date fin</label>
                                        <input v-model="form.vignette_end_date" type="date" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-xs" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-500 mb-1">Montant charge</label>
                                        <input v-model="form.vignette_amount" type="number" min="0" step="0.01" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-xs" />
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-500 mb-1">Validité (jours)</label>
                                        <input v-model="form.vignette_validity_days" type="number" min="0" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-xs" />
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-slate-500 mb-1">Charge journalière</label>
                                    <input v-model="form.vignette_daily_charge" type="number" min="0" step="0.01" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-xs" />
                                </div>
                            </div>
                        </section>

                        <!-- Carte grise -->
                        <section class="border border-slate-200 dark:border-slate-700 rounded-xl p-4">
                            <h4 class="text-sm font-bold text-amber-500 mb-3 uppercase tracking-wide">Carte Grise</h4>
                            <div class="space-y-3">
                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-500 mb-1">Date début</label>
                                        <input v-model="form.carte_grise_start_date" type="date" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-xs" />
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-500 mb-1">Date fin</label>
                                        <input v-model="form.carte_grise_end_date" type="date" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-xs" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-500 mb-1">Montant charge</label>
                                        <input v-model="form.carte_grise_amount" type="number" min="0" step="0.01" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-xs" />
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-500 mb-1">Validité (jours)</label>
                                        <input v-model="form.carte_grise_validity_days" type="number" min="0" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-xs" />
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-slate-500 mb-1">Charge journalière</label>
                                    <input v-model="form.carte_grise_daily_charge" type="number" min="0" step="0.01" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-xs" />
                                </div>
                            </div>
                        </section>

                        <!-- Autorisation -->
                        <section class="border border-slate-200 dark:border-slate-700 rounded-xl p-4">
                            <h4 class="text-sm font-bold text-amber-500 mb-3 uppercase tracking-wide">Autorisation</h4>
                            <div class="space-y-3">
                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-500 mb-1">Date début</label>
                                        <input v-model="form.autorisation_start_date" type="date" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-xs" />
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-500 mb-1">Date fin</label>
                                        <input v-model="form.autorisation_end_date" type="date" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-xs" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-500 mb-1">Montant charge</label>
                                        <input v-model="form.autorisation_amount" type="number" min="0" step="0.01" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-xs" />
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-500 mb-1">Validité (jours)</label>
                                        <input v-model="form.autorisation_validity_days" type="number" min="0" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-xs" />
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-slate-500 mb-1">Charge journalière</label>
                                    <input v-model="form.autorisation_daily_charge" type="number" min="0" step="0.01" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-xs" />
                                </div>
                            </div>
                        </section>

                        <!-- Mouchards -->
                        <section class="border border-slate-200 dark:border-slate-700 rounded-xl p-4">
                            <h4 class="text-sm font-bold text-amber-500 mb-3 uppercase tracking-wide">Mouchards</h4>
                            <div class="space-y-3">
                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-500 mb-1">Date début</label>
                                        <input v-model="form.mouchard_start_date" type="date" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-xs" />
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-500 mb-1">Date fin</label>
                                        <input v-model="form.mouchard_end_date" type="date" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-xs" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-500 mb-1">Montant charge</label>
                                        <input v-model="form.mouchard_amount" type="number" min="0" step="0.01" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-xs" />
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-500 mb-1">Validité (jours)</label>
                                        <input v-model="form.mouchard_validity_days" type="number" min="0" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-xs" />
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-slate-500 mb-1">Charge journalière</label>
                                    <input v-model="form.mouchard_daily_charge" type="number" min="0" step="0.01" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-xs" />
                                </div>
                            </div>
                        </section>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-4">
                    <Link :href="route('vehicles.index')" class="px-6 py-2.5 text-slate-600 dark:text-slate-400 hover:text-slate-800 dark:hover:text-white font-medium transition">
                        Annuler
                    </Link>
                    <button 
                        type="submit" 
                        :disabled="form.processing" 
                        class="px-8 py-2.5 bg-blue-600 hover:bg-blue-700 disabled:opacity-50 disabled:cursor-not-allowed text-white rounded-xl font-semibold shadow-lg shadow-blue-500/30 transition flex items-center gap-2"
                    >
                        <svg v-if="form.processing" class="animate-spin w-5 h-5" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Enregistrer le véhicule
                    </button>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

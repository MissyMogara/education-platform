<x-app-layout>
   
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sobre Nosotros - Plataforma de educación') }}
        </h2>
    </x-slot>
    <div class="p-4">
        
        <main class="container mx-auto my-8 p-4 bg-white dark:bg-gray-800 dark:text-white rounded-lg shadow">
            <section id="sobre-nosotros" class="mb-8">
                <h2 class="text-2xl font-bold mb-4">Sobre Nosotros</h2>
                <p class="mb-4">Bienvenidos a nuestra plataforma de educación online. Nuestra misión es proporcionar una experiencia de aprendizaje integral y accesible para todos nuestros usuarios. Ofrecemos una variedad de cursos en diferentes áreas como programación, diseño, marketing y más.</p>
                <p class="mb-4">Nuestros cursos están diseñados por expertos en la materia y están disponibles para cualquier persona interesada en mejorar sus habilidades y conocimientos. Ya seas un estudiante, un profesional o simplemente alguien con curiosidad por aprender, tenemos algo para ti.</p>
                <p>Únete a nuestra comunidad y empieza tu viaje de aprendizaje hoy mismo.</p>
            </section>
            <section id="contacto">
                <h2 class="text-2xl font-bold mb-4">Contacto</h2>
                <p class="mb-4">Si tienes alguna pregunta o necesitas asistencia, no dudes en ponerte en contacto con nosotros:</p>
                <ul class="list-disc list-inside">
                    <li>Email: <a href="mailto:soporte@plataformaeducacion.com" class="text-blue-500 hover:underline">soporte@plataformaeducacion.com</a></li>
                    <li>Teléfono: +34 123 456 789</li>
                    <li>Dirección: Calle de la Educación, 123, 28001 Madrid, España</li>
                </ul>
            </section>
        </main>
        
    </div>
    <x-slot name="footer">
        {{ __('Mogara') }}
    </x-slot>
</x-app-layout>
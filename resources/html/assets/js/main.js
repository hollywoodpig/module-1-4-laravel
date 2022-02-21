// input files

const inputFiles = document.querySelectorAll('.input_file')

inputFiles.forEach(file => {
	const fileInput = file.querySelector('input[type="file"]')
	const fileLabel = file.querySelector('.input_file__label')

	file.addEventListener('change', () => {
		const fileName = fileInput.files[0].name

		file.classList.add('active')
		fileLabel.textContent = fileName
	})
})

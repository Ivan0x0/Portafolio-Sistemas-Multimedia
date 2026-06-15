import cv2
import sys

# 1. Recibir la ruta de la imagen desde PHP
if len(sys.argv) < 2:
    print("Error: No se recibió ninguna imagen.")
    sys.exit()

ruta_imagen = sys.argv[1]
imagen = cv2.imread(ruta_imagen)

if imagen is None:
    print("Error: No se pudo leer la imagen subida.")
    sys.exit()

# 2. Aplicar el Filtro de Promedio con una ventana de 3x3
# Esto recorre la imagen tomando bloques de 3x3 píxeles y promediándolos
imagen_suavizada = cv2.blur(imagen, (3, 3))

# 3. Guardar el resultado
cv2.imwrite('resultado_suavizado.jpg', imagen_suavizada)

# 4. Imprimir mensaje para la web
print("Suavizado 3x3 Aplicado Correctamente")
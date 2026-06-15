import cv2
import sys
if len(sys.argv) < 2:
    print("Error: No se recibió ninguna imagen.")
    sys.exit()

ruta_imagen = sys.argv[1]
imagen = cv2.imread(ruta_imagen)

if imagen is None:
    print("Error: No se pudo leer la imagen subida.")
    sys.exit()
imagen_suavizada = cv2.blur(imagen, (3, 3))
cv2.imwrite('resultado_suavizado.jpg', imagen_suavizada)
print("Suavizado 3x3 Aplicado Correctamente")

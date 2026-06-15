import cv2
import numpy as np
import sys

if len(sys.argv) < 2:
    print("Error: No se recibió ninguna imagen.")
    sys.exit()

ruta_imagen = sys.argv[1]
imagen = cv2.imread(ruta_imagen)

if imagen is None:
    print("Error: No se pudo leer la imagen subida.")
    sys.exit()

imagen_hsv = cv2.cvtColor(imagen, cv2.COLOR_BGR2HSV)

mascara_cesped = cv2.inRange(imagen_hsv, np.array([35, 40, 40]), np.array([85, 255, 255]))
mascara_asfalto = cv2.inRange(imagen_hsv, np.array([0, 0, 40]), np.array([180, 50, 150]))
mascara_tierra = cv2.inRange(imagen_hsv, np.array([10, 50, 20]), np.array([30, 255, 150]))

pixeles_cesped = cv2.countNonZero(mascara_cesped)
pixeles_asfalto = cv2.countNonZero(mascara_asfalto)
pixeles_tierra = cv2.countNonZero(mascara_tierra)

max_pixeles = max(pixeles_cesped, pixeles_asfalto, pixeles_tierra)

if max_pixeles < 500:
    mensaje_final = "Textura No Reconocida"
elif max_pixeles == pixeles_cesped:
    mensaje_final = "Cesped Detectado"
elif max_pixeles == pixeles_tierra:
    mensaje_final = "Tierra Detectada"
else:
    mensaje_final = "Asfalto Detectado"

resultado = imagen.copy()

resultado[mascara_cesped > 0] = [0, 255, 0]
resultado[mascara_asfalto > 0] = [0, 0, 255]
resultado[mascara_tierra > 0] = [255, 255, 0]

cv2.imwrite('resultado_textura.jpg', resultado)

print(mensaje_final)
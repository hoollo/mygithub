import tensorflow as tf
import matplotlib.pyplot as plt
import numpy as np

def get_img(string):
    image_raw_data = tf.gfile.FastGFile(string,'rb').read()

    with tf.Session() as sess:
        img_data = tf.image.decode_jpeg(image_raw_data)
    
         # 输 出解码之后的三维矩阵。
        print(img_data.eval())
        img_data.set_shape([1797, 2673, 3])
        print(img_data.get_shape())

    with tf.Session() as sess:
        # 如果直接以0-255范围的整数数据输入resize_images，那么输出将是0-255之间的实数，
        # 不利于后续处理。本书建议在调整图片大小前，先将图片转为0-1范围的实数。
        image_float = tf.image.convert_image_dtype(img_data, tf.float32)
        resized = tf.image.resize_images(image_float, [300, 300], method=0)
        img=resized.eval()
    return img
    

def main():
    str="F:/untitled-副本/upload"
    img=get_img(str)
    plt.imshow(img)
    plt.show()

if __name__ == '__main__':
    main()
